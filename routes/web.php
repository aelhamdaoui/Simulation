<?php

Route::get('/', function () {
    return view('home');
})->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Participant
Route::any('participant/search','ParticipantController@search')->name('participant.search');
Route::resource('participant','ParticipantController');


//Type participant
Route::resource('typeparticipant','TypeParticipantController');


//Materiel
Route::any('materiel/search','MaterielController@search')->name('materiel.search');
Route::resource('materiel','MaterielController');


//Categorie materiel
Route::resource('catmateriel','CatMaterielController');


//Salle
Route::resource('salle','SalleController');


//Formation
Route::get('event/activate/{id}','FormationController@activate')->name('formation.active');
Route::any('event/search','FormationController@search')->name('formation.search');
Route::any('event/rapport','FormationController@rapport')->name('formation.rapport');
Route::get('event/certificate/{event}/{participant}/{encadrant}','FormationController@certificate')->name('formation.certificate');
Route::resource('formation','FormationController');


//Formation Participant : 
Route::get('participant/select/{x}','FormationParticipantController@select')->name('select_par');
Route::get('event/show/{link}/{formation}/{encadrant}','FormationParticipantController@index')->name('show_par');
Route::get('particpant/delete/{link}/{participant}/{formation}/{enc}','FormationParticipantController@delete')->name('delete_par');
Route::get('event/create/{link}/{id}/{enc}','FormationParticipantController@create')->name('create_par');
Route::post('participant/store/{link}/{id}/{enc}','FormationParticipantController@store')->name('store_par.post');



//Formation Materiel : 
Route::get('materiel/select/{x}','FormationMaterielController@select')->name('select_mat');
Route::get('materiel/show/{id}','FormationMaterielController@index')->name('show_mat');
Route::get('materiel/delete/{materiel}/{formation}','FormationMaterielController@delete')->name('delete_mat');
Route::get('materiel/create/{id}','FormationMaterielController@create')->name('create_mat');
Route::any('materiel/store/{id}','FormationMaterielController@store')->name('store_mat.post');



//Formation salles : 
Route::get('salle/select/{x}','FormationSalleController@select')->name('select_sal');
Route::get('salle/show/{id}','FormationSalleController@index')->name('show_sal');
Route::get('salle/delete/{salle}/{formation}','FormationSalleController@delete')->name('delete_sal');
Route::get('salle/create/{id}','FormationSalleController@create')->name('create_sal');
Route::any('salle/store/{id}','FormationSalleController@store')->name('store_sal.post');



Route::get('autocomplete', 'AutocompleteController@index');
Route::get('fetch/{query}', 'AutocompleteController@fetch')->name('fetch');