<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use Carbon\Carbon;
use Livewire\WithPagination;

class UserVente extends Component
{
    use LivewireAutocomplet;
    use WithPagination;
    public function paginationView(){

        return 'livewire.pagination';

    }
    public function updatedQuery()
    {
        $this->items = User::where('role','=',3)->where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.user-vente',[
            'users' => User::whereDate('created_at', Carbon::today())->where('role','=',3)->where('name', 'like', '%' . $this->query. '%')->paginate(6)
        ]);
    }
}
