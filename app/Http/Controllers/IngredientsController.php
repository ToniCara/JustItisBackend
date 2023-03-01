<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Ingredient;


class IngredientsController extends Controller{

    public function getIngredient(){

    $ingredienti = Ingredient::all();
    return response()->json(['ingredients' => $ingredienti]);
    
    }

}
