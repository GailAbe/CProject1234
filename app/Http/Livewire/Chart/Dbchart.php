<?php

namespace App\Http\Livewire\Chart;

use Livewire\Component;
use App\Models\Household;
use App\Models\Incident;
use App\Models\Complaint;

class Dbchart extends Component
{
    public function render()
    {
        $households = Household::all()->count();
        $incidents = Incident::all()->count();
        $complaints = Complaint::all()->count();

        return view('livewire.chart.dbchart', compact('households', 'incidents', 'complaints'));
    }
}
