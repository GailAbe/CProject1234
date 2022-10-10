<?php

namespace App\Http\Livewire\Complaint;

use Livewire\Component;
use App\Models\Complaint;

class TrashComplaint extends Component
{
    public $complaint;

    protected $listeners = ['restore', 'forceDelete'];

    public function restoreConfirm()
    {
        $this->dispatchBrowserEvent('swal:restore', [
            'id' => $this->complaint->id,
            'message' => 'Are you sure to restore?'
        ]);
    }

    public function restore($id)
    {
        $complaint = Complaint::onlyTrashed()->where('id', $id)->first();
        if ($complaint != null) {
            $complaint->restore();
            return redirect()->route('trashbin.index')->with('success', 'Complaint has been successfully restored');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong! Complaint cannot be restored');
    }

    public function forceDelConfirm()
    {
        $this->dispatchBrowserEvent('swal:forceDel', [
            'id' => $this->complaint->id,
            'message' => 'Are you sure to delete permanently?'
        ]);
    }

    public function forceDelete($id)
    {
        $complaint = Complaint::onlyTrashed()->where('id', $id)->first();
        if ($complaint != null) {
            $complaint->forceDelete();
            return redirect()->route('trashbin.index')->with('success', 'Complaint has been deleted permanently!');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.complaint.trash-complaint');
    }
}
