<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
        'id_FeedBack',
        'id_utente',
        'tipo',
        'id_ordineComplessivo',
        'commento',
        'data'
    ];
}
