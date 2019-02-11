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

use Illuminate\Http\Request;

Route::get('/cards', 'CardController@indexView' );
Route::get('/cards/all','CardController@index');
Route::post('/cards','CardController@store');
Route::get('/cards/delete/{id}','CardController@destroy');

Route::get('/login', function (){
    return view('login');
});

Route::post('/usuarios/logar','UsuarioController@login');
Route::post('/usuarios', 'UsuarioController@store');

Route::get('/logout', function (Request $request){
    $request->session()->flush();
    return redirect('/login');
});