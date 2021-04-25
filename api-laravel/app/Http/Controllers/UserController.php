<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        //Get by post
        $json = $request->input('json', null); //By default it will be null
        $params = json_decode($json); //Converts from JSON to OBJECT
        $data = [];

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $name = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $surname = (!is_null($json) && isset($params->surname)) ? $params->surname : null;
        $role = (!is_null($json) && isset($params->surname)) ? $params->surname : 'ROLE_USER';
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;

        if (!is_null($email) && !is_null($password) && !is_null($name)) {
            //Create an user
            $user = new User();
            $user->email = $email;
            $user->name = $name;
            $user->surname = $surname;
            $user->role = $role;
            $user->password = hash('sha256', $password);

            //Checks if the user is not duplicated
            $countUser = User::where('email', '=', $email)->count();
            //$countUser = User::where('email', $email)->first();

            if ($countUser === 0) {
                //Save the user
                $user->save();
                $data = [
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'User created successfully'
                ];
            } else {
                //Not save, the user already exist
                $data = [
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'Email already exists, it cannot be register twice.'
                ];
            }
        } else {
            $data = [
                'status' => 'error',
                'code' => 400,
                'message' => 'User not created'
            ];
        }

        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        echo 'Action login';
        die();
    }
}
