<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailed_order extends Model
{
    use HasFactory;
    protected $table = 'detailed_orders';
    protected $fillable = [
        'id_dettaglioOrdine',
        'id_ingrediente',
        'tipoRaggruppamento'
      
    ];
}
