<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

  Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController', [
    'parameters' => [
      'usuarios' => 'user', 
    ],
    'names' => [
      'index' => 'users',
      'create' => 'users_create',
      'edit' => 'users_edit',
      'store' => 'users_store',
      'destroy' => 'users_destroy',
    ]
  ]);

  Route::resource('eventos', 'App\Http\Controllers\Admin\EventController', [
    'parameters' => [
      'eventos' => 'event', 
    ],
    'names' => [
      'index' => 'events',
      'create' => 'events_create',
      'edit' => 'events_edit',
      'store' => 'events_store',
      'destroy' => 'events_destroy',
    ]
  ]);

  Route::resource('idiomas', 'App\Http\Controllers\Admin\LanguageController', [
    'parameters' => [
      'idiomas' => 'language', 
    ],
    'names' => [
      'index' => 'languages',
      'create' => 'languages_create',
      'edit' => 'languages_edit',
      'store' => 'languages_store',
      'destroy' => 'languages_destroy',
    ]
  ]);

  Route::resource('faqs', 'App\Http\Controllers\Admin\FaqController', [
    'names' => [
      'index' => 'faqs',
      'create' => 'faqs_create',
      'edit' => 'faqs_edit',
      'store' => 'faqs_store',
      'destroy' => 'faqs_destroy',
    ]
  ]);

  Route::resource('empresas', 'App\Http\Controllers\Admin\BusinessProfileController', [
    'parameters' => [
      'empresas' => 'business_profile', 
    ],
    'names' => [
      'index' => 'business_profiles',
      'create' => 'business_profiles_create',
      'edit' => 'business_profiles_edit',
      'store' => 'business_profiles_store',
      'destroy' => 'business_profiles_destroy',
    ]
  ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
