<?php

namespace App\Http\Livewire;

use App\Models\produit;
use Livewire\Component;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;

class GestionStock extends Component
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
        return view('livewire.gestion-stock',[
            'produits'=> produit::where('name', 'like', '%' . $this->query. '%')->get()
        ]);
    }
}
