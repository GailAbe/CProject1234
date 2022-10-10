<?php

namespace App\Http\Livewire\Incident;

use Livewire\Component;
use App\Models\Incident;

class TrashIncident extends Component
{
    public $incident;

    protected $listeners = ['restore', 'forceDelete'];

    public function restoreConfirm()
    {
        $this->dispatchBrowserEvent('swal:restore', [
            'id' => $this->incident->id,
            'message' => 'Are you sure to restore?'
        ]);
    }

    public function restore($id)
    {
        $incident = Incident::onlyTrashed()->where('id', $id)->first();
        if ($incident != null) {
            $incident->restore();
            return redirect()->route('trashbin.index')->with('success', 'Incident has been successfully restored');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong! Incident cannot be restored');
    }

    public function forceDelConfirm()
    {
        $this->dispatchBrowserEvent('swal:forceDel', [
            'id' => $this->incident->id,
            'message' => 'Are you sure to delete permanently?'
        ]);
    }

    public function forceDelete($id)
    {
        $incident = Incident::onlyTrashed()->where('id', $id)->first();
        if ($incident != null) {
            $incident->forceDelete();
            return redirect()->route('trashbin.index')->with('success', 'Incident has been deleted permanently!');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.incident.trash-incident');
    }
}
