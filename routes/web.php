<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MainController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('contact', [MainController::class, 'contact'])->name('contact');
    Route::get('courses', [MainController::class, 'allCourses'])->name('courses');
    Route::get('course/{course_id}', [MainController::class, 'course'])->name('course');
    Route::get('cart', [MainController::class, 'getCart'])->name('getCart');
});

Route::middleware('auth')->group(function() {
    Route::post('/add-category', [MainController::class, 'addCategory'])->name('addCategory');
    Route::post('/add-course', [MainController::class, 'addCourse'])->name('addCourse');
    Route::get('/delete-course/{course_id}', [MainController::class, 'deleteCourse'])->name('deleteCourse');
    Route::get('/edit-course/{course_id}', [MainController::class, 'edit_course'])->name('edit_course');
    Route::post('/edit-course/{course_id}', [MainController::class, 'editCourse'])->name('editCourse');
    Route::get('/add-to-cart/{course_id}', [MainController::class, 'addToCart']);
    Route::get('/remove-cart/{course_id}', [MainController::class, 'removeFromCart']);
});
require __DIR__.'/auth.php';
