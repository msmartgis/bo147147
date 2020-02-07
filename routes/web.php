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


        //document types
        Route::get('/type-documents/get-all-documents-types', 'DocumentTypeController@getAllDocumentType')->name('document-type.getDocumentType');

        //files
        Route::get('/files/download/{directory}/{subdirectory}/{id}/{file_name}', 'FilesController@fileDownload')->name('files.download');        




        //courrier entrants
        Route::get('/courriers-entrants/tous', 'CourrierController@tousCourrier')->name('documents-entrants-tous');
        Route::get('/courriers-entrants/brouillon', 'CourrierController@brouillonCourrier')->name('documents-entrants-brouillon');
        Route::get('/courriers-entrants/en-cours', 'CourrierController@enCoursCourrier')->name('documents-entrants-en-cours');
        Route::get('/courriers-entrants/en-retard', 'CourrierController@enRetardCourrier')->name('documents-entrants-en-retard');
        Route::get('/courriers-entrants/cloture', 'CourrierController@clotureCourrier')->name('documents-entrants-cloture');
        Route::post('/courriers/valider', 'CourrierController@validateCourrier')->name('courriers-entrants-validateCourrier');




        //courrier sortants
        Route::get('/courriers-sortants/tous', 'CourrierSortantController@tousCourrier')->name('documents-sortants-tous');
        Route::get('/courriers-sortants/brouillon', 'CourrierSortantController@brouillonCourrier')->name('documents-sortants-brouillon');
        Route::get('/courriers-sortants/en-cours', 'CourrierSortantController@enCoursCourrier')->name('documents-sortants-en-cours');
        //Route::get('/courriers-entrants/en-retard', 'CourrierController@enRetardCourrier')->name('documents-entrants-en-retard');
        Route::get('/courriers-sortants/cloture', 'CourrierSortantController@clotureCourrier')->name('documents-sortants-cloture');
        Route::post('/courriers-sortants/valider', 'CourrierController@validateCourrier')->name('courriers-entrants-validateCourrier');


        //diffusion interne 
        Route::get('/diffusions-internes/tous', 'DiffusionInterneController@tousDiffusionInterne')->name('diffusions-internes-tous');

        Route::resources([
            'courriers-entrants' => 'CourrierController',
            'courriers-sortants' => 'CourrierSortantController',
            'services' => 'ServiceController',
            'modes-receptions' => 'ModeReceptionController',
            'documents-types' => 'DocumentTypeController',
            'users' => 'UsersController',
            'diffusions-internes' => 'DiffusionInterneController',

        ]);

        //delete courrier
        Route::post('/courriers/delete', 'CourrierController@deleteCourrier')->name('courriers-delete');

        Route::get('/home', 'DashboardController@index')->name('home');

        //courriers entrants
        Route::get('/courriers-entrants', 'CourrierController@index')->name('documents-entrants');
        Route::get('/courriers-entrants/create', 'CourrierController@create')->name('documents-entrants-create');



        //Courriers sortants
        Route::get('/courriers-sortants', 'CourrierSortantController@index')->name('documents-sortants');
        Route::get('/courriers-sortants/create', 'CourrierSortantController@create')->name('documents-sortants-create');
        Route::get('/courriers-sortants/{id}/create-sortant', 'CourrierSortantController@createSortant')->name('documents-entrants-create-sortant');


        //diffusion internes 
        Route::get('/diffusions-internes', 'DiffusionInterneController@index')->name('diffusions-internes');
        Route::get('/diffusions-internes/create', 'DiffusionInterneController@create')->name('diffusions-internes-create');

        Route::post('/diffusions-internes/delete', 'DiffusionInterneController@deleteDiffusionInterne')->name('diffusionInterne-delete');

        //parametres
        Route::get('/parametres', 'ParametresController@index')->name('parametres.index');
        Route::get('/settings/users', 'ParametresController@getUsers');
        Route::get('/settings/categories', 'ParametresController@getCategories');
        Route::get('/settings/modes-receptions', 'ParametresController@getModesReceptions');
        Route::get('/settings/services', 'ParametresController@getServices');
    }
);
