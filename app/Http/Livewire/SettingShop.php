<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use App\Models\shop;

class SettingShop extends Component
{

    use LivewireAutocomplet;

    public function updatedQuery()
    {
        $this->items = shop::where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.setting-shop',[
            'shops'=> shop::where('name','LIKE',"%{$this->query}%")->get()
        ]);
    }
}
