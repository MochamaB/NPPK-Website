<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController as ClientPageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\PageController as AdminPageController;

// Client Routes
// Dynamic page routes - these will be handled by our PageController
Route::get('/', [ClientPageController::class, 'show'])->name('home');
Route::get('/page/{slug}', [ClientPageController::class, 'show'])->name('page.show');

// Map common URLs to the page controller
Route::get('/about-party', [ClientPageController::class, 'show'])->name('about')->defaults('slug', 'about-party');
Route::get('/vision-and-mission', [ClientPageController::class, 'show'])->name('vision')->defaults('slug', 'vision-and-mission');
Route::get('/party-history', [ClientPageController::class, 'show'])->name('history')->defaults('slug', 'party-history');
Route::get('/leadership', [ClientPageController::class, 'show'])->name('leadership')->defaults('slug', 'leadership');
Route::get('/news', [ClientPageController::class, 'show'])->name('news')->defaults('slug', 'news');
Route::get('/resources', [ClientPageController::class, 'show'])->name('resources')->defaults('slug', 'resources');
Route::get('/shop', [ClientPageController::class, 'show'])->name('shop')->defaults('slug', 'shop');
Route::get('/contact-us', [ClientPageController::class, 'show'])->name('contact')->defaults('slug', 'contact-us');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        // Login Routes
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
        
        // Registration Routes
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('admin.register');
        Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
        
        // Password Reset Routes
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });
    
    // Email Verification Routes
    Route::middleware('auth')->group(function () {
        Route::get('/verify-email', function () {
            return view('auth.admin.verify-email');
        })->name('verification.notice');
        
        Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');
            
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');
    });
    
    // Authenticated routes
    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Menu Management Routes
        Route::resource('menus', MenuController::class, ['as' => 'admin']);
        Route::get('menus/{menu}/items', [MenuController::class, 'items'])->name('admin.menus.items');
        Route::get('menus/{menu}/items/create', [MenuItemController::class, 'create'])->name('admin.menu-items.create');
        Route::post('menus/{menu}/items', [MenuItemController::class, 'store'])->name('admin.menu-items.store');
        Route::get('menus/{menu}/items/{menuItem}/edit', [MenuItemController::class, 'edit'])->name('admin.menu-items.edit');
        Route::put('menus/{menu}/items/{menuItem}', [MenuItemController::class, 'update'])->name('admin.menu-items.update');
        Route::delete('menus/{menu}/items/{menuItem}', [MenuItemController::class, 'destroy'])->name('admin.menu-items.destroy');
        Route::post('menus/{menu}/items/order', [MenuItemController::class, 'updateOrder'])->name('admin.menu-items.order');
        
        // Page Management Routes
        Route::resource('pages', AdminPageController::class, ['as' => 'admin']);
        
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});

// Include API authentication routes (excluding the ones we've defined above)
// require __DIR__.'/auth.php';
