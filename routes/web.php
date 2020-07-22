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


Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/relatorios', function () {
    return view('postos.relatorio');
});


Auth::routes();

Route::resource('/postos','PostosController')
->middleware('auth');

Route::resource('/cidades','CidadesController')
->middleware('auth');

Route::resource('/combustiveis','CombustiveisController')
->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


