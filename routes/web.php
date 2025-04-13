<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ThemeController;
use App\Http\Middleware\CheckIfNameIsAhmed;

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

Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/store', 'store')->name('contact.store');
    Route::get('/displayContacts', 'display')->name('display');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/services', 'services')->name('services'); // ← هذا هو المطلوب
});




