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

        $video = new Video();
        $user = \Auth::user(); //The \ will search the object automatically
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        $video->save();

        return redirect()->route('home')->with([
            'message' => 'The video has uploaded successfully'
        ]);
    }
}
