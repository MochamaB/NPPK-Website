<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\AdminMiddleware;

// Client Routes
// Dynamic page routes - these will be handled by our PageController
Route::get('/', [PageController::class, 'show'])->name('home');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

// Map common URLs to the page controller
Route::get('/about-party', [PageController::class, 'show'])->name('about')->defaults('slug', 'about-party');
Route::get('/vision-and-mission', [PageController::class, 'show'])->name('vision')->defaults('slug', 'vision-and-mission');
Route::get('/party-history', [PageController::class, 'show'])->name('history')->defaults('slug', 'party-history');
Route::get('/leadership', [PageController::class, 'show'])->name('leadership')->defaults('slug', 'leadership');
Route::get('/news', [PageController::class, 'show'])->name('news')->defaults('slug', 'news');
Route::get('/resources', [PageController::class, 'show'])->name('resources')->defaults('slug', 'resources');
Route::get('/shop', [PageController::class, 'show'])->name('shop')->defaults('slug', 'shop');
Route::get('/contact-us', [PageController::class, 'show'])->name('contact')->defaults('slug', 'contact-us');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    });
    
    // Authenticated routes
    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});

// Include API authentication routes (excluding the ones we've defined above)
// require __DIR__.'/auth.php';
