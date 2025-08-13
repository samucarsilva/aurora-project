<?php


use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Route;


// Aurora Routes


    // About Us

        Route::get('about', function () {
            return view('about', ['page' => 'about']);
        })->name('about');


    // Home Page

        Route::get('/', function () {
            return view('home', ['page' => 'home']);
        })->name('home');



// Auth Routes


    // Register

        Route::get('register', [RegisterController::class, 'create'])->name('register.create');

        Route::post('register', [RegisterController::class, 'store'])->name('register.store');


    // Login

        Route::get('login', function () {
            return view('auth.login', ['page' => 'login']);
        })->name('login.create');


    // Forgot

        Route::get('forgot-password', function () {
            return view('auth.forgot-password', ['page' => 'forgot-password']);
        })->name('forgot');


    // Forgot

        Route::get('reset-password', function () {
            return view('auth.reset-password', ['page' => 'reset-password']);
        })->name('reset');



// Courses Routes

    Route::get('courses', function () {
        return view('courses.index', ['page' => 'courses']);
    })->name('courses');

