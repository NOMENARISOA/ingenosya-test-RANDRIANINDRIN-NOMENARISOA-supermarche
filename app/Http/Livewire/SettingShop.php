<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use App\Models\shop;
use Livewire\WithPagination;

class SettingShop extends Component
{

    use LivewireAutocomplet;

    use WithPagination;

    public function paginationView(){

        return 'livewire.pagination';

    }
    public function updatedQuery()
    {
        $this->items = shop::where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.setting-shop',[
            'shops'=> shop::where('name','LIKE',"%{$this->query}%")->paginate(6)
        ]);
    }
}
