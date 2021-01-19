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
// Route::match(['get', 'post'], 'contacto', function () {
//     return 'contacto';
// });

/** 
 * You just call the function using any method HTTP
 */
Route::any('anyTest', function () {
    return 'any Test';
});

//This is the way to sent a param, the param could be NULL if you add the ? at the end of the paramName
Route::get('contacto/{nombre?}', function ($nombre = "Test Param") {
    return view('contacto', array(
        'nombreHTML' => $nombre
    ));
})->where([
    'nombre' => '[A-Za-z0-9]+' //This helps to filter the values, this param will accept only the letters, for the number will be [0-9]+, the + means indefinite times
]);