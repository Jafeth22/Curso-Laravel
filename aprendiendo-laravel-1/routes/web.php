<?php

use Illuminate\Support\Facades\Route;

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

/** 
 * Here, we can replace Get by another method: post, put or delete
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * In this way, we can use several methods HTTP, but you have to specify which are the methods
 */
Route::match(['get', 'post'], 'hola-mundo', function () {
    return view('hola-mundo');
});

/** 
 * You just call the function using any method HTTP
 */
Route::any('anyTest', function () {
    return 'any Test';
});

//This is the way to sent a param, the param could be NULL if you add the ? at the end of the paramName
Route::get('contacto/{nombre?}', function ($nombre = "Test Param") {
    //To sent information to the view, we have 2 options
    ////This is ths FIRST option
    // return view('contacto', array(
    //     'nombreHTML' => $nombre
    // ));
    ////SECOND Option
    //This is in case the view file is inside a carpet, the structure is: folderName.fileName or folderName/fileName
    return view('contacto.contacto')->with('nombreHTML', $nombre); //In case we need to sent more param, just add it below of the first WITH
})->where([
    'nombre' => '[A-Za-z0-9]+' //This helps to filter the values, this param will accept only the letters, for the number will be [0-9]+, the + means indefinite times
]);

//To call the methods from the controller automatically
//Route::resource('frutas','FrutasController');
/*
    This Route::resource('routeName', 'ControllerName')
    •Verb 	    •URI 	                 •Action    •Route Name
    GET 	    /routeName 	             index  	routeName.index
    GET 	    /routeName/create 	     create     routeName.create
    POST 	    /routeName 	             store  	routeName.store
    GET 	    /routeName/{param} 	     show   	routeName.show
    GET 	    /routeName/{param}/edit  edit   	routeName.edit
    PUT/PATCH 	/routeName/{param} 	     update     routeName.update
    DELETE 	    /routeName/{param} 	     destroy    routeName.destroy
*/

//
Route::group(['prefix' => 'fruteria'], function () {
    //To call the method inside the controller, one by one
    Route::get('/frutas', 'FrutasController@getIndex');
    //This way we add a middleware
    Route::get('/naranjas/{admin?}', [
        'middleware' => 'IsAdmin', //To add a middleware, First, we should add it at Kernel file, section routeMiddleware
        'uses' => 'FrutasController@getNaranjas',
        'as' => 'oranges' //This is an alis for the route
    ]);
    Route::get('/peras', 'FrutasController@anyPeras');
});

Route::post('/receive', 'FrutasController@receiveForms');
//------------------------------------------------------------------------------------
Route::resource('notes','NotesController')->except(['update']);
Route::get('notes/delete/{id}','NotesController@delete');
Route::post('notes/update/{id}','NotesController@update');