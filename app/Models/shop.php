<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasMany('App\Models\user_shop','shop_id');
    }
    public function produit(){
        return $this->hasMany('App\Models\shop_produit','shop_id');
    }
    public function vente(){
        return $this->hasMany('App\Models\vente','shop_id');
    }
}
