<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Videos::orderBy('id','desc')->paginate(5);
        // dd($videos);
        // die();
        return view('home',[
            'videos' => $videos
        ]);
    }
}
