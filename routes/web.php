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
Route::get('/catsList','CatController@index');
Route::get('/catsList/edit/{id}', 'CatController@edit');
Route::post('/catsList/edit/{id}', 'CatController@update');
Route::get('/insert-json-file-to-database-table', function(){
	$json = file_get_contents(storage_path('cats.json'));
	$cats = json_decode($json,true);
	foreach ($cats as $cat)  {
		foreach ($cat as $key => $value) {
            $value = Arr::add($value, 'votes', 0);
            //dd($value);
			$insertArr[Str::slug($key, '-')] = $value;
            //dd($insertArr[Str::slug($key, '-')]);
		}
        $insertArr = array_map(function($tag) {
            return array(
                'image_url' => $tag['url'],
                'image_id' => $tag['id'],
                'votes' => $tag['votes']
            );
        }, $insertArr);

        //dd($insertArr);
		DB::table('cats')->insert($insertArr);
	}
	dd("Finished adding data in examples table");
});