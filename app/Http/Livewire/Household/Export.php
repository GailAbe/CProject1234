<?php

namespace App\Http\Livewire\Household;

use Livewire\Component;
use App\Models\Household;

class Export extends Component
{
    public $households;

    public function export()
    {
        $this->households = Household::with('members')->get();

        // dd($this->households);
    }

    public function render()
    {
        return view('livewire.household.export');
    }
}
