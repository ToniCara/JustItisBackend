<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    private function addToBalance(User $user, $value)
    {
        $user->update([
            'bilancio' => $user->bilancio +$value,
            'updated_at' => now()
        ]);
    }

    public function make(Request $request) {
        $token = $request->header('token');
        $userLogged = Socialite::driver('google')->userFromToken($token);
        $user = User::where('email',$userLogged->email)->first();
        PaymentController::addToBalance($user, 10);
        $user->save();
        return response($user->bilancio);
    }

}
