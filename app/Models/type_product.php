<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'type_products';
    protected $fillable = [
        'ID_tipoProdoto',
        'nome',
        'descrizione'
    ];
}
