<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluminate\Support\Facades\DB;
use Iluminate\Support\Facades\Storage; //Upload files and save into Storage folder
use Illuminate\Http\Response;

use App\Video;
use App\Comment;

class VideoController extends Controller
{
    public function createVideo(){
        return view("video.createVideo");
    }
    
    public function saveVideo(Request $request)
    {
        date_default_timezone_set("America/Costa_Rica");
        $validateData = $this->validate($request, [
            'title' => 'required|min:5', //This mean, that it is required and should have at least 5 letters
            'description' => 'required',
            //'video' => 'mimes:mp4', //Specify the format of the videos
        ]);

        $video = new Video();
        $user = \Auth::user(); //The \ will search the object automatically
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        //Upload the miniature
        $image = $request->file('image');
        if($image){
            $imageName = date("YmdHis", time()).'-'.$image->getClientOriginalName();
            $image->storeAs('public/images',$imageName);
            //\Storage::disk('public')->putFileAs('images', $image, $imageName);
            $video->image = $imageName;
        }
        //Upload the video
        $videoFile = $request->file('video');
        if($videoFile){
            $videoName = date("YmdHis", time()).'-'.$videoFile->getClientOriginalName();
            //Another way to save files, "READ Notas codigo" file
            \Storage::disk('public')->putFileAs('videos', $videoFile, $videoName);
            $video->videoPath = $videoName;
        }
        
        $video->save();

        return redirect()->route('home')->with([
            'messageSuccess' => 'The video has uploaded successfully'
        ]);
    }
    
    public function getVideoDetail($id)
    {
        $video = Video::find($id);
        return view('video.details',[
            'video' => $video
        ]);
    }
    
    public function getVideoFile($idVideo)
    {
        $video = Storage::disk('videos')->get($idVideo);
        return new Response($video,900);
    }
}
