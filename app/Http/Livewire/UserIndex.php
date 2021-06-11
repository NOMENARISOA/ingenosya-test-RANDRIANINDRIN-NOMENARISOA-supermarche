<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use App\Models\shop;
use Livewire\Component;

class UserIndex extends Component
{
    use LivewireAutocomplet;

    public function updatedQuery()
    {
        $this->items = User::where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }
    public function render()
    {
        return view('livewire.user-index',[
            'users'=> User::where('name','LIKE',"%{$this->query}%")->get(),
            'shops'=> shop::all()
        ]);
    }
}
