<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    private function getIngredient($id)
    {
        $ingredient = Ingredient::find($id);
        return $ingredient;
    }

    public function createOrder(Request $request){
        $token = $request->header('token');
        $userLogged = Socialite::driver('google')->userFromToken($token);
        $user = User::where('email',$userLogged->email)->first();
    }

}
