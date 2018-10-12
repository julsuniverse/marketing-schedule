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
Route::post('/send_sms', 'DataController@get_data');
Route::get('/', function() {
   return redirect('/marketing');
});
Route::get('/marketing/{month?}/{year?}', 'Marketing\MarketingController@index')->name('marketing');
Route::post('/update', 'Marketing\MarketingController@update');
Route::post('/update-colors', 'Marketing\MarketingController@updateColors');
Route::post('/report/{marketing}', 'Marketing\MarketingController@report');

Route::post('/keyword/store', 'Marketing\KeywordController@store');