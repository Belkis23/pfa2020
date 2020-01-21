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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'administrations',
], function () {
    Route::get('/', 'AdministrationsController@index')
         ->name('administrations.administrations.index');
    Route::get('/create','AdministrationsController@create')
         ->name('administrations.administrations.create');
    Route::get('/show/{administrations}','AdministrationsController@show')
         ->name('administrations.administrations.show')->where('id', '[0-9]+');
    Route::get('/{administrations}/edit','AdministrationsController@edit')
         ->name('administrations.administrations.edit')->where('id', '[0-9]+');
    Route::post('/', 'AdministrationsController@store')
         ->name('administrations.administrations.store');
    Route::put('administrations/{administrations}', 'AdministrationsController@update')
         ->name('administrations.administrations.update')->where('id', '[0-9]+');
    Route::delete('/administrations/{administrations}','AdministrationsController@destroy')
         ->name('administrations.administrations.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'clubs',
], function () {
    Route::get('/', 'ClubsController@index')
         ->name('clubs.clubs.index');
    Route::get('/create','ClubsController@create')
         ->name('clubs.clubs.create');
    Route::get('/show/{clubs}','ClubsController@show')
         ->name('clubs.clubs.show')->where('id', '[0-9]+');
    Route::get('/{clubs}/edit','ClubsController@edit')
         ->name('clubs.clubs.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClubsController@store')
         ->name('clubs.clubs.store');
    Route::put('clubs/{clubs}', 'ClubsController@update')
         ->name('clubs.clubs.update')->where('id', '[0-9]+');
    Route::delete('/clubs/{clubs}','ClubsController@destroy')
         ->name('clubs.clubs.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'etudiants',
], function () {
    Route::get('/', 'EtudiantsController@index')
         ->name('etudiants.etudiants.index');
    Route::get('/create','EtudiantsController@create')
         ->name('etudiants.etudiants.create');
    Route::get('/show/{etudiants}','EtudiantsController@show')
         ->name('etudiants.etudiants.show')->where('id', '[0-9]+');
    Route::get('/{etudiants}/edit','EtudiantsController@edit')
         ->name('etudiants.etudiants.edit')->where('id', '[0-9]+');
    Route::post('/', 'EtudiantsController@store')
         ->name('etudiants.etudiants.store');
    Route::put('etudiants/{etudiants}', 'EtudiantsController@update')
         ->name('etudiants.etudiants.update')->where('id', '[0-9]+');
    Route::delete('/etudiants/{etudiants}','EtudiantsController@destroy')
         ->name('etudiants.etudiants.destroy')->where('id', '[0-9]+');
});
