<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('layouts.admin');
});
Route::get('roles', function () {
    return view('roles.index');
});



Route::get('testhome', function () {
    return view('test.home');
});
Route::get('testcontact', function () {
    return view('test.contact');
});
Route::get('testabout', function () {
    return view('test.about');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/verify', function () {
    return view('pages.verify');
});
Route::get('/mkubwa', function () {
    return view('pages.admin');
});

