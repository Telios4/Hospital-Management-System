<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
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