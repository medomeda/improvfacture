<?php

namespace App\Http\Controllers\API\V1;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Users\UserRequest;
use App\Http\Controllers\API\V1\BaseController;



class UserController extends BaseController
{
  
    public function register(Request $request) {
   
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
            'type' => 'admin'
        ]);

        return response([
            'user' => $user,
            'token' => $user->createToken('tokens')->plainTextToken,
        ], 200);
    }
    
    public function login(Request $request) {

        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(!Auth::attempt($attrs)){
            return response([
                'message' => 'Paramètres de connexion invalides.'
            ], 403);
        }

        return response([
            'user' => Auth::user(),
            'token' => Auth::user()->createToken('secret')->plainTextToken,
        ]);
    }

    public function logout() {
        Auth::user()->tokens()->delete();
        return response([
            'message' => 'Logout success.',
        ],200);
    }

    public function user() {
        $user = DB::table('users')->where('id', Auth::user()->id)
        ->select('users.*')
        ->selectRaw("CONCAT('" . url('/') . "', '/storage/', users.photo) AS photo_url")
        ->first();
        return response([
            'user' =>  $user //Auth::user()
        ],200);
    }

    public function update(Request $request) {
        
        $request->validate([
            'name' => 'required|string',
        ]);
  
        if($request->image != null) {
            $filename = basename(Auth::user()->photo);
            if (Storage::disk('profiles')->exists($filename)) {
                Storage::disk('profiles')->delete($filename);
            }
            $image =  $this->saveImage($request->image, 'profiles');
            $request->merge(['photo' =>  $image]);
        }

        Auth::user()->update($request->all());

        return response([
            'message' => 'User updated.',
            'user' => Auth::user()
        ],200);

    }
}
