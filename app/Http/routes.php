<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/',[
    'uses'  => 'UserProfileController@index',
    'as'    => 'homeUser'
]);
*/

Route::get('/',[
    'uses'  => 'CarController@index',
    'as'    => 'registerCarIndex'
]);

Route::get('registrar_nuevo_auto',[
    'uses'  => 'CarController@registerNewCar',
    'as'    => 'registerNewCar'
]);

Route::post('guardar_auto',[
    'uses'  => 'CarController@storeNewCar',
    'as'    => 'storeNewCar'
]);

//TIME LINE/////////////////////////////////////////////////////////////////
Route::get('linea_de_tiempo',[
    'uses'  => 'TimeLineController@index',
    'as'    => 'timeLineIndex'
]);
Route::get('listCar/{id}','TimeLineController@showDates');

//HISTORI//////////////////////////////////////////////////////////////////
Route::get('historial',[
    'uses' => 'TimeLineController@history',
    'as'    => 'historyIndex'
]);

//PROFILE//////////////////////////////////////////////////////////////////
Route::get('perfil_usuario',[
    'uses'  => 'UserProfileController@profile',
    'as'    => 'userProfile'
]);
Route::post('save_user',[
    'uses'  => 'UserProfileController@store',
    'as'    => 'saveUserProfile'
]);
Route::get('registrar_usuario',[
    'uses'  => 'UserProfileController@forUserProfile',
    'as'    => 'forUserProfile'
]);
Route::get('edit_user','UserProfileController@forUserEdit');
Route::post('updateUserProfile','UserProfileController@updateUserProfile');