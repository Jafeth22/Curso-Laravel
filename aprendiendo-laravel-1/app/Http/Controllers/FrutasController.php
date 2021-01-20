<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrutasController extends Controller
{
    //methodhttpActionname: This is to create the view's route automatically

    // Action that return a view
    public function getIndex()
    {
        return view('frutas.index')
            ->with('frutas', ['naranja', 'pera', 'sandia', 'fresa', 'melon', 'piña']);
    }

    public function getNaranjas()
    {
        return 'Acción Naranjas';
    }

    public function anyPeras()
    {
        return 'Acción peras';
    }

    public function receiveForms(Request $request){
        $data = $request;
        //var_dump($data->all());
        //dd($request->all());
        //die(); //Stop the execution here
        //return 'The values of the fruit are: ' .$data['fruitName'].' and '.$data['fruitDescription'];
        //This is a best way to catch the values
        return 'The values of the fruit are: ' .$data->input('fruitName').' and ' .$data->input('fruitDescription');
    }
}
