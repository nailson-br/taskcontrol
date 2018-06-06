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

Route::get('/', function () {
    return view('main');
});

Route::get('tarefas', function() {
	return view('pages.tarefas');
});

Route::post('tarefas', 'TaskController@store');
Route::get('lista_tarefas', 'TaskController@index');
Route::get('detalhes_da_tarefa/{id}', 'TaskController@edit');

Route::post('sub_tarefa', 'SubTaskController@store');
Route::get('lista_sub_tarefas/{id?}', 'SubTaskController@index');

Route::post('registrar_andamento/{id}', 'TaskController@registerProgress');