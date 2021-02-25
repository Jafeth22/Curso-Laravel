<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluminate\Support\Facades\DB;
use Iluminate\Support\Facades\Storage; //Upload files and save into Storage folder
use Symfony\Component\HttpFoundation\Response;

use App\Video;
use App\Comment;

class VideoController extends Controller
{
    public function createVideo(){
        return view("video.createVideo");
    }
    
    public function saveVideo(Request $request)
    {
        $validateData = $this->validate($request, [
            'title' => 'required|min:5', //This mean, that it is required and should have at least 5 letters
            'description' => 'required',
            'video' => 'mimes:mp4', //Specify the format of the videos
        ]);
    }
}
