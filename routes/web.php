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
    return redirect('/events?language='.session('lang'));
});

Route::group([
    'namespace'  => 'App\Http\Controllers',
], function () { // custom admin routes
    // Route::get('/', 'EventsController@index');
    Route::resource('/events', 'EventsController');
    Route::resource('/categories', 'CategoryController');
    Route::get('/get-languages', 'LanguageController@getLanguages');
    Route::get('/get-categories', 'CategoryController@getCategories');
    Route::post('/event-assistants', 'EventAssistantController@saveAssistant');
    Route::post('/change-language', 'LanguageController@changeLanguage');
});