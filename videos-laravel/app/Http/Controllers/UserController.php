<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; //Upload files and save into Storage folder
use Illuminate\Http\Response;

use App\Videos;
use App\Comments;
use App\User;

class UserController extends Controller
{
    public function channel($id)
    {
        $user = User::find($id);

        if (!is_object($user)) {
            return redirect()->route('home');
        }

        $videos = Videos::where('User_Id', $id)->paginate(5);

        return view('user.channel',[
            'user' => $user,
            'videos' => $videos
        ]);
    }
}
