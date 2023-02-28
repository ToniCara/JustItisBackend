<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class FeedbackController extends Controller{

    public function createFeedback(Request $request){

        $token = $request->header('token');
        $userLogged = Socialite::driver('google')->userFromToken($token);
        $user = User::where('email',$userLogged->email)->first();

        $newFeedback = Feedback::create([
            'id_FeedBack' => 1,
            'id_utente' => $user->id_utente,
            'tipo' => 0,
            'commento' => 'buono',
            'updated_at' => now()
        ]);

        $newFeedback->save();
        return response('work');
    }

}
