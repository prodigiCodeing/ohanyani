<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller
{
    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
         try {
//             dd(Socialite::driver('facebook')->stateless()->user());

             $user = Socialite::driver('facebook')->user();
             $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],[
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName().'@'.$user->getId()),
            ]);
            Auth::loginUsingId($saveUser->id);

            return redirect('/start-game');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
