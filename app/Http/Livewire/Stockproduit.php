<?php

namespace App\Http\Livewire;

use App\Models\produit;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use Livewire\Component;
use Livewire\WithPagination;

class Stockproduit extends Component
{
    use LivewireAutocomplet;
    use WithPagination;

    public function paginationView(){

        return 'livewire.pagination';

    }


    public function updatedQuery()
    {
        $this->items = produit::where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }

    public function render()
    {

        return view('livewire.stockproduit',[
           'produits'=> produit::where('name', 'like', '%' . $this->query. '%')->paginate(6)
        ]);
    }
}
