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
    'prefix' => 'clients',
], function () {
    Route::get('/', 'ClientsController@index')
         ->name('clients.client.index');
    Route::get('/create','ClientsController@create')
         ->name('clients.client.create');
    Route::get('/show/{client}','ClientsController@show')
         ->name('clients.client.show')->where('id', '[0-9]+');
    Route::get('/{client}/edit','ClientsController@edit')
         ->name('clients.client.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClientsController@store')
         ->name('clients.client.store');
    Route::put('client/{client}', 'ClientsController@update')
         ->name('clients.client.update')->where('id', '[0-9]+');
    Route::delete('/client/{client}','ClientsController@destroy')
         ->name('clients.client.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'etudiants',
], function () {
    Route::get('/', 'EtudiantsController@index')
         ->name('etudiants.etudiant.index');
    Route::get('/create','EtudiantsController@create')
         ->name('etudiants.etudiant.create');
    Route::get('/show/{etudiant}','EtudiantsController@show')
         ->name('etudiants.etudiant.show')->where('id', '[0-9]+');
    Route::get('/{etudiant}/edit','EtudiantsController@edit')
         ->name('etudiants.etudiant.edit')->where('id', '[0-9]+');
    Route::post('/', 'EtudiantsController@store')
         ->name('etudiants.etudiant.store');
    Route::put('etudiant/{etudiant}', 'EtudiantsController@update')
         ->name('etudiants.etudiant.update')->where('id', '[0-9]+');
    Route::delete('/etudiant/{etudiant}','EtudiantsController@destroy')
         ->name('etudiants.etudiant.destroy')->where('id', '[0-9]+');
});
