<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed_order extends Model
{
    use HasFactory;
    protected $table = 'completed_orders';
    protected $fillable = [
        'id_ordineComplessivo',
        'id_dettaglioOrdine',
        'id_utente',
        'lista',
        'stato',
        'prezzo_totale'
    ];
}
