<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Video;
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     $result = Video::all();

//     //To know the values of the DB's connection
//     /*if (DB::connection()->getDatabaseName()) {
//         //echo "conncted sucessfully to database " . DB::connection()->getDatabaseName();
//         $databaseName = Config::get('database.connections.' . Config::get('database.default'));
//         dd($databaseName);
//         die();
//     }*/
//     foreach ($result as $data) {
//         echo $data->Title.'---'.$data->User->Name.'<br/>'; //On this line, I'm using the FK to get the name of the user
//         echo $data->Comments->Body;
//         // var_dump($data->Comments->toArray());
//         // echo '<br/>';
//         // var_dump($data->Commenta2->toArray());
//         // echo '<br/>';
//         // foreach ($data->Comments->toArray() as $key => $item) {
//         //     echo '*'.$key.'---'.$item.'<br/>';
//         // }
//         // // dd($data->Comments);
//         echo '<hr>';
//     }

//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//---------------------------------------------------------------------------------------------
//Videos
Route::get('/create-video',[
    'as' => 'createVideo',
    'middleware' => 'auth', //This particular middleware verify if you are login
    'uses' => 'VideoController@createVideo'
]);

Route::post('/save-video',[
    'as' => 'saveVideo',
    'middleware' => 'auth', //This particular middleware verify if you are login
    'uses' => 'VideoController@saveVideo'
]);

Route::get('/video/{id}',[
    'as' => 'videoDetail',
    'uses' => 'VideoController@getVideoDetail'
]);

Route::get('/videoFile/{path}',[
    'as' => 'fileVideo',
    'uses' => 'VideoController@getVideoFile'
]);

Route::get('/delete-video/{id}',[
    'as' => 'deleteVideo',
    'middleware' => 'auth', //This particular middleware verify if you are login
    'uses' => 'VideoController@delete'
]);

Route::get('/editing-video/{id}',[
    'as' => 'editingVideo',
    'middleware' => 'auth', //This particular middleware verify if you are login
    'uses' => 'VideoController@edit'
]);

Route::post('/update-video/{id}',[
    'as' => 'updateVideo',
    'middleware' => 'auth', //This particular middleware verify if you are login
    'uses' => 'VideoController@update'
]);

Route::get('/search/{search?}',[
    'as' => 'searchVideo',
    'uses' => 'VideoController@search'
]);
//---------------------------------------------------------------------------------------------
// Comments
Route::post('/comment',[
    'as' => 'comment',
    'middleware' => 'auth', //This particular middleware verify if you are login
    'uses' => 'CommentController@store'
]);

Route::get('/delete-comment/{id}',[
    'as' => 'deleteComment',
    'middleware' => 'auth', //This particular middleware verify if you are login
    'uses' => 'CommentController@delete'
]);