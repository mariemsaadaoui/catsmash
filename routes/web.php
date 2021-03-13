<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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

//Route::resource('cats', 'CatController', ['only' => [
  //  'index', 'store', 'destroy',
//]]);
//Route::get('/cats',[CatController::class, 'index']);
//Route::post('/store',[CatController::class, 'store']);
Route::get('/catsList','CatController@index1');
Route::get('/imagesList','CatController@index2');
Route::get('/catsList/edit/{id}', 'CatController@edit');
Route::post('/catsList/edit/{id}', 'CatController@update');
Route::get('/insert-json-file-to-database-table', 'CatController@insert');