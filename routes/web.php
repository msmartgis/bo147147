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
    return view('auth.login');
});

Auth::routes();
Route::group(
    ['middleware' => 'auth'],
    function () {
        //services
        Route::get('/services/get_service', 'ServiceController@getService')->name('services.getService');

        //mode reception
        Route::get('/modes-receptions/get-all-mode-reception', 'ModeReceptionController@getAllModeReception')->name('mode-reception.getAllModeReception');



        Route::resources([
            'courriers-entrants' => 'CourrierController',
            'services' => 'ServiceController',
            'modes-receptions' => 'ModeReceptionController',
        ]);

        Route::get('/home', 'HomeController@index')->name('home');

        //courriers entrants
        Route::get('/courriers-entrants', 'CourrierController@index')->name('documents-entrants');
        Route::get('/courriers-entrants/create', 'CourrierController@create')->name('documents-entrants-create');
    }
);
