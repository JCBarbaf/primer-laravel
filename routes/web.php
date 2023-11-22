<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['name' => 'señor oscuro']);
});
Route::get('/admin/users', function () {
    return view('admin.users.index');
});
Route::get('/admin/events', function () {
    return view('admin.events.index');
});