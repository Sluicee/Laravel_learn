<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::name('user.')->group(function(){
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function () {
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', 'App\Http\Controllers\LoginController@login');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');

    Route::get('/registration', function () {
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', 'App\Http\Controllers\RegisterController@save');
});

Route::get('/contact/all/{id}/delete', 'App\Http\Controllers\ContactController@deleteMessage')->name('contact-delete');
Route::post('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessageSubmit')->name('contact-update-submit');
Route::get('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessage')->name('contact-update');
Route::get('/contact/all/{id}', 'App\Http\Controllers\ContactController@showMessage')->name('contact-message');
Route::get('/contact/all', 'App\Http\Controllers\ContactController@allData')->name('contact-messages');

Route::post('/contact/submit', 'App\Http\Controllers\ContactController@submit')->name('contact-form');
