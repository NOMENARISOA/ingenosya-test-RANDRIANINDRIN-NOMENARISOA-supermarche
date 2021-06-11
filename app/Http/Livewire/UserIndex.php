<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use App\Models\shop;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use LivewireAutocomplet;
    use WithPagination;

    public function paginationView(){

        return 'livewire.pagination';

    }
    public function updatedQuery()
    {
        $this->items = User::where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }
    public function render()
    {
        return view('livewire.user-index',[
            'users'=> User::where('name','LIKE',"%{$this->query}%")->paginate(6),
            'shops'=> shop::all()
        ]);
    }
}
