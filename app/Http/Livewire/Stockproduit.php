<?php

namespace App\Http\Livewire;

use App\Models\produit;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use Livewire\Component;

class Stockproduit extends Component
{
    use LivewireAutocomplet;



    public function updatedQuery()
    {
        $this->items = produit::where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }

    public function render()
    {

        return view('livewire.stockproduit',[
           'produits'=> produit::where('name', 'like', '%' . $this->query. '%')->get()
        ]);
    }
}
