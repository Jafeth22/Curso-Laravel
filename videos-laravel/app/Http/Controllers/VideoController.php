<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluminate\Support\Facades\DB;
//use Iluminate\Support\Facades\Storage; //Upload files and save into Storage folder
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use App\Videos;
use App\Comments;

class VideoController extends Controller
{
    public function createVideo()
    {
        return view("video.createVideo");
    }

    public function saveVideo(Request $request)
    {
        date_default_timezone_set("America/Costa_Rica");
        $this->validate($request, [
            'title' => 'required|min:5', //This mean, that it is required and should have at least 5 letters
            'description' => 'required',
            'video' => 'mimes:mp4', //Specify the format of the videos
        ]);

        $video = new Videos();
        $user = \Auth::user(); //The \ will search the object automatically
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        //Upload the miniature
        $image = $request->file('image');
        if ($image) {
            $imageName = date("YmdHis", time()) . '-' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            //Storage::disk('public')->putFileAs('images', $image, $imageName);
            $video->image = $imageName;
        }
        //Upload the video
        $videoFile = $request->file('video');
        if ($videoFile) {
            $videoName = date("YmdHis", time()) . '-' . $videoFile->getClientOriginalName();
            //Another way to save files, "READ Notas codigo" file
            Storage::disk('public')->putFileAs('videos', $videoFile, $videoName);
            $video->videoPath = $videoName;
        }

        $video->save();

        return redirect()->route('home')->with([
            'messageSuccess' => 'The video has uploaded successfully'
        ]);
    }

    public function getVideoDetail($id)
    {
        $video = Videos::find($id);
        return view('video.details', [
            'video' => $video
        ]);
    }

    public function getVideoFile($path)
    {
        $video = Storage::files($path);
        
        // $video = Storage::disk('videos')->get($idVideo);
        // return new Response($video,900);
        return $video;
    }

    public function delete($id)
    {
        $user = \Auth::user();
        $video = Videos::find($id);

        if ($user && $video->User_Id == $user->id) {
            Comments::where('videos_id', $id)->delete();
            Storage::disk('public')->delete('videos/' . $video->VideoPath);
            //Storage::disk('public')->delete('images/'.$video->Image);
            unlink(public_path('storage\\images\\' . $video->Image)); //Using Core PHP

            $video->delete();
            $message = ['messageSuccess' => 'Video deleted successfully'];
        } else {
            $message = ['messageSuccess' => 'Video didn\'t deleted successfully'];
        }

        return redirect()->route('home')
            ->with($message);
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $video = Videos::findOrFail($id); //It returns an error case where no exist the record

        if ($user && $video->User_Id == $user->id) {
            return view('video.edit', ['video' => $video]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5', //This mean, that it is required and should have at least 5 letters
            'description' => 'required',
            'video' => 'mimes:mp4', //Specify the format of the videos
        ]);

        $user = \Auth::user();
        $video = Videos::find($id);
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        //Upload the miniature
        $image = $request->file('image');
        if ($image) {
            $imageName = date("YmdHis", time()) . '-' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            //Storage::disk('public')->putFileAs('images', $image, $imageName);
            $video->image = $imageName;
        }
        //Upload the video
        $videoFile = $request->file('video');
        if ($videoFile) {
            $videoName = date("YmdHis", time()) . '-' . $videoFile->getClientOriginalName();
            //Another way to save files, "READ Notas codigo" file
            Storage::disk('public')->putFileAs('videos', $videoFile, $videoName);
            $video->videoPath = $videoName;
        }

        $video->update();

        return redirect()->route('home')->with([
            'messageSuccess' => 'The video has been uploaded successfully'
        ]);
    }

    public function search($search = null)
    {
        if(is_null($search)){
            $search = \Request::get('search');
        }
        $result = Videos::where('Title', 'LIKE', '%'.$search.'%')->paginate(5);

        return view('video.search', [
            'videos' => $result,
            'search' => $search
        ]);
    }
}
