<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vente extends Model
{
    use HasFactory;

    public function shop(){
        return $this->belongsTo('App\Models\shop','shop_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function allproduit(){
        return $this->hasMany('App\Models\vente_produit','vente_id');
    }
}
