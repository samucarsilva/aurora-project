<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['page' => 'home']);
})->name('home');

