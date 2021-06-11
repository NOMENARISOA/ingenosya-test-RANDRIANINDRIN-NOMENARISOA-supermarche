<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;

    public function shop(){
        return $this->hasMany('App\Models\shop_produit','produit_id');
    }

    public function vente(){
        return $this->hasMany('App\Models\vent_produit','produit_id');
    }
}
