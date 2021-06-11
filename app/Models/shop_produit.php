<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop_produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
    ];
    public function produit(){
        return $this->belongsTo('App\Models\produit','produit_id');
    }
    public function shop(){
        return $this->belongsTo('App\Models\shop','shop_id');
    }
}
