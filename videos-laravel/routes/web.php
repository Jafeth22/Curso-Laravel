<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Video;

Route::get('/', function () {
    $result = Video::all();

    //To know the values of the DB's connection
    /*if (DB::connection()->getDatabaseName()) {
        //echo "conncted sucessfully to database " . DB::connection()->getDatabaseName();
        $databaseName = Config::get('database.connections.' . Config::get('database.default'));
        dd($databaseName);
        die();
    }*/
    foreach ($result as $data) {
        echo $data->Title.'---'.$data->User->Name.'<br/>'; //On this line, I'm using the FK to get the name of the user
        echo $data->Comments->Body;
        // foreach ($data->Comments as $key => $item) {
        //     echo '*'.$key.'---'.$item->Body.'<br/>';
        // }
        // dd($data->Comments);
        echo '<hr>';
    }

    return view('welcome');
});
