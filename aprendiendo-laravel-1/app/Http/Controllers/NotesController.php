<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function index()
    {
        $notes = DB::table('notes')->orderBy('ID', 'desc')->get(); //It will catch all records
        //echo $notes;
        //die();

        return view('notes.index', [
            'notes' => $notes
        ]);
    }

    /**
     * To show only one Item
     */
    public function show($id)
    {
        $note = DB::table('notes')->select('ID', 'title', 'description')->where('id', $id)->first();
        //orWhere(fieldName, $value)

        //var_dump($note);

        if (empty($note)) {
            return redirect()->action('NotesController@index');
        }

        return view('notes.note', [
            'note' => $note
        ]);
    }

    /**
     * Save a new Item
     */
    public function store(Request $request)
    {
        $result = DB::table('notes')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        ////Ways to redirect
        /**
         * •redirect('route of the view'); //Redirect a specific route
         * •redirect()->action(controllerName@methodName)->WithInput(); The WithInput is optional
         * •redirect()->route('RouteAlias');
         * •back(); Go back to the last route
         */
        return redirect()->action('NotesController@index');
    }

    /**
     * Go to the create view
     */
    public function create()
    {
        return view('notes/createNote');
    }

    /**
     * Delete an item
     */
    public function delete($id)
    {
        $result = DB::table('notes')->where('id', $id)->delete();

        return redirect()->action('NotesController@index')->with('status', 'Note deleted successfully!!!');
    }

    /**
     * Update an existen item
     */
    public function update($id, Request $request)
    {
        $result = DB::table('notes')->where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        return redirect()->action('NotesController@index')->with('status', 'Note updated successfully!!!');
    }

    /**
     * To sent the information of the item to the form
     */
    public function edit($id)
    {
        $result = DB::table('notes')->select('ID', 'title', 'description')->where('id', $id)->first();

        return view('notes.createNote', [
            'note' => $result
        ]);
    }
}
