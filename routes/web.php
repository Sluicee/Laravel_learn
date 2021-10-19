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


Route::get('/contact', 'App\Http\Controllers\ContactController@getContactForm')->middleware('auth')->name('contact');

Route::name('user.')->group(function(){
    Route::get('/private', 'App\Http\Controllers\ContactController@messagesByUser')->middleware('auth')->name('private');

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

Route::get('/message/all/{id}/delete', 'App\Http\Controllers\ContactController@deleteMessage')->middleware('auth')->name('contact-delete');
Route::post('/message/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessageSubmit')->middleware('auth')->name('contact-update-submit');
Route::get('/message/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessage')->middleware('auth')->name('contact-update');
Route::get('/message/all/{id}', 'App\Http\Controllers\ContactController@showMessage')->middleware('auth')->name('contact-message');
Route::get('/message/all', 'App\Http\Controllers\ContactController@allData')->middleware('auth')->name('contact-messages');

Route::post('/message/submit', 'App\Http\Controllers\ContactController@submit')->middleware('auth')->name('contact-form');

Route::post('/apptypeadd', 'App\Http\Controllers\ApplicationTypeController@applicationTypeAdd')->middleware('auth')->name('applicationType-add');
Route::post('/apptypedelete', 'App\Http\Controllers\ApplicationTypeController@applicationTypeDelete')->middleware('auth')->name('applicationType-delete');
