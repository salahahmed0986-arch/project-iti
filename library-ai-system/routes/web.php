<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\BookComparisonController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Home Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Books
|--------------------------------------------------------------------------
*/

// View all books - Admin and User
Route::get('/books', [BookController::class, 'index'])
    ->middleware('auth');

// Add book - Admin only
Route::get('/books/create', [BookController::class, 'create'])
    ->middleware(['auth', 'admin']);

Route::post('/books', [BookController::class, 'store'])
    ->middleware(['auth', 'admin']);

// Edit book - Admin only
Route::get('/books/{id}/edit', [BookController::class, 'edit'])
    ->middleware(['auth', 'admin']);

Route::put('/books/{id}', [BookController::class, 'update'])
    ->middleware(['auth', 'admin']);

// Delete book - Admin only
Route::delete('/books/{id}', [BookController::class, 'destroy'])
    ->middleware(['auth', 'admin']);

// Show one book - Admin and User
Route::get('/books/{id}', [BookController::class, 'show'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/

// Categories - Admin only
Route::get('/categories', [CategoryController::class, 'index'])
    ->middleware(['auth', 'admin']);

Route::get('/categories/create', [CategoryController::class, 'create'])
    ->middleware(['auth', 'admin']);

Route::post('/categories', [CategoryController::class, 'store'])
    ->middleware(['auth', 'admin']);

Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
    ->middleware(['auth', 'admin']);

Route::put('/categories/{id}', [CategoryController::class, 'update'])
    ->middleware(['auth', 'admin']);

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
    ->middleware(['auth', 'admin']);


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'admin']);


/*
|--------------------------------------------------------------------------
| AI Chat
|--------------------------------------------------------------------------
*/

// Open AI Chat page
Route::get('/chat', function () {
    return view('chat');
})->middleware('auth');

// Send message to AI
Route::post('/chat', [ChatController::class, 'chat'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Recommendations
|--------------------------------------------------------------------------
*/

Route::get('/recommendations', [RecommendationController::class, 'index'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Book Comparison
|--------------------------------------------------------------------------
*/

Route::get('/book-comparison', [BookComparisonController::class, 'index'])
    ->middleware('auth');

Route::post('/book-comparison', [BookComparisonController::class, 'compare'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Users Management
|--------------------------------------------------------------------------
*/

// Admin only
Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth', 'admin']);

Route::get('/users/create', [UserController::class, 'create'])
    ->middleware(['auth', 'admin']);

Route::post('/users', [UserController::class, 'store'])
    ->middleware(['auth', 'admin']);

Route::get('/users/{id}/edit', [UserController::class, 'edit'])
    ->middleware(['auth', 'admin']);

Route::put('/users/{id}', [UserController::class, 'update'])
    ->middleware(['auth', 'admin']);

Route::delete('/users/{id}', [UserController::class, 'destroy'])
    ->middleware(['auth', 'admin']);


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';