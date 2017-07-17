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

Route::resource('/', 'SearchController');

Auth::routes();

/*Route::get('/dashboard', 'HomeController@index')->name('home');*/

Route::middleware(['auth'])->namespace('Admin')->prefix('panel')->group(function () {
    Route::get('/', 'DashboardController@index');

    Route::resource('cities',    'CityController');
    Route::resource('complexes', 'ResidentialComplexController');
    Route::resource('buildings', 'BuildingController');
    Route::resource('flats',     'FlatController');

    Route::get('complexes/{id}/buildings', 'ResidentialComplexController@listBuildings');
});