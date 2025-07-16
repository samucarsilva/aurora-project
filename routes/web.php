<?php

use Illuminate\Support\Facades\Route;


Route::get('/about', function () {
    return view('about', ['page' => 'about']);
})->name('about');


Route::get('/courses', function () {
    return view('courses', ['page' => 'courses']);
})->name('courses');


Route::get('/', function () {
    return view('home', ['page' => 'home']);
})->name('home');


Route::get('/login', function () {
    return view('login', ['page' => 'login']);
})->name('login');


Route::get('/register', function () {
    return view('register', ['page' => 'register']);
})->name('register');