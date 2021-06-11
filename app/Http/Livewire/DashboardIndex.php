<?php

namespace App\Http\Livewire;

use App\Models\vente;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;

class DashboardIndex extends Component
{


     function render()
    {
        // $vente = vente::whereDate('created_at', Carbon::today())->groupBy('shop_id')->selectRaw('sum(montant_total) as sum','shop_id')->pluck('sum','shop_id');




        return view('livewire.dashboard-index',[
            'todayChart' =>vente::whereDate('created_at', Carbon::today())->groupBy('shop_id')->selectRaw('*, sum(montant_total) as sum')->get()
            ]
        );
    }
}
