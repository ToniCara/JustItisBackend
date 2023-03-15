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



    public function createOrder(Request $request)
    {
        $token = $request->header('token');
        $userLogged = Socialite::driver('google')->userFromToken($token);
        $user = User::where('email', $userLogged->email)->first();
    }
/* da comprendere ulteriormente l'inserimento dell'ordine per ora questo è un prototipo ci vogliono spiegazioni più accurate per individuare come 
   eseguire il controllo per la classe
    public function controlClass(Request $request)
    {
        $token = $request->header('token');
        $userLogged = Socialite::driver('google')->userFromToken($token);
        $user = User::where('email', $userLogged->email)->first();
        $class = User::select('classe')->where('email', '=', $userLogged->email)->get();
        if ($class) {
            return $class;
        } else {
            return 'errore non puoi ordinare senza aver settatto la classe nel proprio profilo';
        }
    }
    */
    //controllo per verificare senza richiedere all'applicazione il tempo se è ancora in orario l'utente per assegnare il proprio prodotto alla tipologia lista
    private function controlTime()
    {
        $ora_attuale = now()->format('H:i:s');
        $ora_predefinita = now()->format('H:i:s')->setTime(14, 30, 0);

        if ($ora_attuale->compare($ora_predefinita) < 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
