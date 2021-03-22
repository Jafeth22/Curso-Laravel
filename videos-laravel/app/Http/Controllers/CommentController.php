<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'body' => 'required'
        ]);
        //date_default_timezone_set("America/Costa_Rica");

        // dd($request);
        // die();
        
        $comment = new Comments();
        $user = \Auth::user();
        $comment->user_id = $user->id;
        $comment->videos_id = $request->input('IdVideo');
        $comment->Body = $request->input('body');

        $comment->save();

        return redirect()->route('videoDetail',['id' => $comment->videos_id])
                        ->with(['message' => 'Comment added successfully']);
    }

    public function delete($id)
    {
        $user = \Auth::user();
        $comment = Comments::find($id);

        if($user && ($comment->user_id == $user->id || $comment->video->id == $user->id)){
            $comment->delete();
        }

        return redirect()->route('videoDetail',['id' => $comment->videos_id])
                        ->with(['message' => 'Comment deleted successfully']);
    }
}
