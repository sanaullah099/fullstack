<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: get('/test', function(){
    return response()->json(['data'=> ['name' => 'sana']]);
});

Route::get('contact', 'ContactController@getContact');
Route::post('contact','ContactController@createContact');
Route::delete('contact/{contact}','ContactController@delete');
Route::get('edit-contact/{contact}','ContactController@showContact');
Route::put('contact/{contact}','ContactController@update');

Route::get('author', 'authorController@getAuthor');
Route::post('author', 'authorController@storeAuthor');
Route::get('author/{author}', 'authorController@showAuthor');
Route::put('author/{authores}', 'authorController@updateAuthor');
Route::delete('author/{author}', 'authorController@delete');

Route::get('book', 'bookController@getBook');
Route::post('book', 'bookController@storeBook');
Route::get('book/{book}', 'bookController@showBook');
Route::put('book/{book}', 'bookController@updateBook');
Route::delete('book/{book}', 'bookController@delete');