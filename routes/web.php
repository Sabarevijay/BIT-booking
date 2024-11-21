<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return redirect('/admin/login');
});

// Login page
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

// Logout-page
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Registration page
Route::get('/admin/register', [LoginController::class, 'showRegistrationForm'])->name('admin.register'); 
Route::post('/admin/register', [LoginController::class, 'register'])->name('admin.register.post');

// Front page
Route::get('/front/index', [IndexController::class, 'index'])->name('front.index');

//admin page
Route::get('/admin/admin', [LoginController::class, 'admin'])->name('admin.admin');
Route::delete('/admin/user/{id}', [LoginController::class, 'destroy'])->name('admin.user.destroy');


// Calculator page
Route::get('/tasks/calc', [IndexController::class, 'calc'])->name('tasks.calc');

// Timer page
Route::get('/tasks/timer', [IndexController::class, 'timer'])->name('tasks.timer');

// Todo page
Route::get('/tasks/todo', [IndexController::class, 'todo'])->name('tasks.todo');


//Booking

Route::get('/tasks/book', [BookController::class, 'index'])->name('tasks.book');
Route::post('/book-now', [BookController::class, 'bookNow'])->name('books.bookNow');

Route::get('/tasks/avail', [BookController::class, 'available'])->name('tasks.available');
Route::get('/tasks/table', [BookController::class, 'showavailable'])->name('tasks.table');
//delete
Route::delete('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');

//feedback-admin
Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.feedback');
Route::post('tasks/feedback',[FeedbackController::class,'store'])->name('tasks.feedback');
