<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PageController;

// Dynamic page routes - these will be handled by our new PageController
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

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
