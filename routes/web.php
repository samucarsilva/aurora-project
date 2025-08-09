<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;


Route::get('about', function () {
    return view('about', ['page' => 'about']);
})->name('about');


Route::get('courses', function () {
    return view('courses.index', ['page' => 'courses']);
})->name('courses');


Route::get('/', function () {
    return view('home', ['page' => 'home']);
})->name('home');


Route::get('login', function () {
    return view('auth.login', ['page' => 'login']);
})->name('login');


Route::get('register', [RegisterController::class, 'create'])->name('register');

Route::post('register', [RegisterController::class, 'store'])->name('register.store');


Route::get('forgot-password', function () {
    return view('auth.forgot-password', ['page' => 'forgot-password']);
})->name('forgot');


Route::get('reset-password', function () {
    return view('auth.reset-password', ['page' => 'reset-password']);
})->name('reset');
