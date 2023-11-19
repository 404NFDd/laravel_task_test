<?php

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
    return view('welcome');
});

Route::get('tests/test', 'TestController@index');

Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function(){
  Route::get('index', 'ContactFormController@index')->name('contact.index');
  Route::get('create', 'ContactFormController@create')->name('contact.create');
  Route::post('store', 'ContactFormController@store')->name('contact.store');
  Route::get('show/{id}', 'ContactFormController@show')->name('contact.show');
  Route::get('edit/{id}', 'ContactFormController@edit')->name('contact.edit');
  Route::post('update/{id}', 'ContactFormController@update')->name('contact.update');
  Route::post('destroy/{id}', 'ContactFormController@destroy')->name('contact.destroy');
});
Route::group(['prefix' => 'answer'], function(){
  Route::get('index', 'answerFormController@index')->name('answer.index');
  Route::post('confirm', 'answerFormController@confirm')->name('answer.confirm');
  Route::post('finish', 'AnswerFormController@finish')->name('answer.finish');

});


