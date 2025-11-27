<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpecialitiesController;

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('roles', function () {
    return view('roles.index');
});*/


Route::resource('roles',RoleController::class);
Route::post('users/{user}/reset-password',[UserController::class,'resetpassword'])->name('users.reset.password');
Route::resource('users',UserController::class);
Route::resource('practitioners',Practitionercontroller::class);
Route::resource('contacts',Contactcontroller::class);
Route::resource('statuses',Statusescontroller::class);
Route::resource('specialities',SpecialitiesController::class);
Route::resource('subspecialities',Subspecialitiescontroller::class);
Route::resource('institutions',Institutioncontroller::class);
Route::resource('degrees',Institutioncontroller::class);
Route::resource('settings',Setttingcontroller::class);


/*
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
*/
