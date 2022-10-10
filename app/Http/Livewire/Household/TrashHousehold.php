<?php

namespace App\Http\Livewire\Household;

use Livewire\Component;
use App\Models\Household;

class TrashHousehold extends Component
{
    public $household;

    protected $listeners = ['restore', 'forceDelete'];

    public function restoreConfirm()
    {
        $this->dispatchBrowserEvent('swal:restore', [
            'id' => $this->household->id,
            'message' => 'Are you sure to restore?'
        ]);
    }

    public function restore($id)
    {
        $household = Household::onlyTrashed()->where('id', $id)->first();
        if ($household != null) {
            $household->restore();
            return redirect()->route('trashbin.index')->with('success', 'Household has been successfully restored');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong! Household cannot be restored');
    }

    public function forceDelConfirm()
    {
        $this->dispatchBrowserEvent('swal:forceDel', [
            'id' => $this->household->id,
            'message' => 'Are you sure to delete permanently?'
        ]);
    }

    public function forceDelete($id)
    {
        $household = household::onlyTrashed()->where('id', $id)->first();
        if ($household != null) {
            $household->forceDelete();
            return redirect()->route('trashbin.index')->with('success', 'Household has been deleted permanently!');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.household.trash-household');
    }
}
