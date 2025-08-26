<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\UserController;


// Aurora Routes


    // Auth Routes


        // Forgot Password

            Route::get('forgot-password', function () {
                return view('auth.forgot-password', ['page' => 'forgot-password']);
            })->name('forgot');


        // Reset Password

            Route::get('reset-password', function () {
                return view('auth.reset-password', ['page' => 'reset-password']);
            })->name('reset');


    // About Us

        Route::get('about', function () {
            return view('about', ['page' => 'about']);
        })->name('about');


    // Home Page

        Route::get('/', function () {
            return view('home', ['page' => 'home']);
        })->name('home');



// Courses Routes

    Route::get('courses', function () {
        return view('courses.index', ['page' => 'courses']);
    })->name('courses');



    // Routes For Authenticated Users

Route::middleware('auth')->group(function () {


    // Auth Routes


        // Logout

            Route::post('logout', [LoginController::class, 'destroy'])->name('logout');



    // User Routes


            // Dashboard

                Route::get('{user}/dashboard', [DashboardController::class, 'index'])->name('dashboard');


            // Edit Profile

            
                Route::get('profile', [UserController::class, 'edit'])->name('user.edit');

                Route::put('profile', [UserController::class, 'update'])->name('user.update');

});



// Routes For Unauthenticated Users

Route::middleware('guest')->group(function () {


    // Auth Routes


        // Register

            Route::get('register', [RegisterController::class, 'create'])->name('register.create');

            Route::post('register', [RegisterController::class, 'store'])->name('register.store');


        // Login

            Route::get('login', [LoginController::class, 'create'])->name('login.create');

            Route::post('login', [LoginController::class, 'store'])->name('login.store');


});

