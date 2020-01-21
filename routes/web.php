<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
})->name("home");

Route::get('about', function () {
    return view('frontend.about');
})->name("about");

Route::get('category', function () {
    return view('frontend.category');
})->name("category");

Route::get('post', function () {
    return view('frontend.single-post');
})->name("post");

Route::get('contact', function () {
    return view('frontend.contact');
})->name("contact");

Route::get('admin/dashboard', function () {
    return view('backend.dashboard');
})->name("dashboard");
