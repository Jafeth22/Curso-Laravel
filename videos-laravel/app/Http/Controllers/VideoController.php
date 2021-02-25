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
            $image_path = date("YmdHis", time()).'-'.$image->getClientOriginalName(); //Concatenates the current date with Name of the item
            \Storage::disk('images')->put($image_path, \File::get($image));//Storage = Folder, disk = name of the folcer child, images = folder where will be located the images
            //\File::get($image) = The file by itself
            $video->image = $image_path;
        }
        //Upload the video
        $videoFile = $request->file('video');
        if($videoFile){
            $video_OriginalName = date("YmdHis", time()).'-'.$videoFile->getClientOriginalName();
            \Storage::disk('videos')->put($video_OriginalName, \File::get($videoFile));//Storage = Folder, disk = name of the folcer child, images = folder where will be located the images
            $video->videoPath = $video_OriginalName;
        }
        
        $video->save();

        return redirect()->route('home')->with([
            'message' => 'The video has uploaded successfully'
        ]);
    }
}
