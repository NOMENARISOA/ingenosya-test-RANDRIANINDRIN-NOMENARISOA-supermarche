<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vente_produit extends Model
{
    use HasFactory;

    public function vente(){
        return $this->belongsTo('App\Models\vente','vente_id');
    }
    public function produit(){
        return $this->belongsTo('App\Models\produit','produit_id');
    }
}
