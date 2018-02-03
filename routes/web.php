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

// AlunoController
Route::get('alunos', 'AlunoController@index');
Route::post('alunos\insere', 'AlunoController@insereAluno');
Route::put('alunos\atualiza\{id}', 'AlunoController@atualizaAluno');
Route::delete('alunos\deleta\{id}', 'AlunoController@deletaAluno');

Route::get('professores', 'ProfessorController@index');
Route::post('professor\insere', 'ProfessorController@insereProfessor');
Route::put('professor\atualiza\{id}', 'ProfessorController@atualizaProfessor');
Route::delete('professores\deleta\{id}', 'ProfessorController@deletaProfessor');

//exemplo de funçao na model
Route::post('alunos\exemplo','AlunoController@getAluno');

//exemplo de funçao na model
Route::post('professor\exemplo','AlunoController@getProfessor');

//ProfessorController

Route::get('professores', 'ProfessorController@index');
