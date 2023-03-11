<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;

class LoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('google')->user();
            // if the user exits, use that user and login
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return response()->json(['token' => $user->token, 'crsf_token' => csrf_token()]);
            }else {
                //user is not yet created, so create first

                $newUser = User::create([
                    'nome' => explode(' ', $user->name)[0],
                    'cognome' => explode(' ', $user->name)[1],
                    'email' => $user->email,
                    'bilancio' => 0,
                    'classe' => 'null',
                    'google_id'=> $user->id,
                    'role' => 'customer',
                ]);
                $newUser->save();
                //login as the new user
                Auth::login($newUser);
                return response()->json(['token' => $user->token]);
            }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
