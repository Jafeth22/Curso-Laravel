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
}
