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
Route::post('/report/{marketing}/{to_admin?}', 'Marketing\MarketingController@report');

Route::post('/keyword/store', 'Marketing\KeywordController@store');
Route::post('/keyword/edit', 'Marketing\KeywordController@edit');
Route::post('/keyword/delete', 'Marketing\KeywordController@delete');

Route::get('company/archive', 'Company\ArchiveController@index')->name('company.archive.index');
Route::put('company/archive/{company}', 'Company\ArchiveController@recover')->name('company.archive.recover');
Route::post('company/change-marketing', 'Company\CompanyController@changeMarketing');
Route::resource('company', 'Company\CompanyController');

Route::get('social-profile/{company}', 'SocialProfileController@show')->name('social-profile.show');
Route::get('social-profile/{company}/create', 'SocialProfileController@create')->name('social-profile.create');
Route::resource('social-profile', 'SocialProfileController')->except(['show', 'create']);
