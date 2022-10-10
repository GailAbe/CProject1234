<?php

namespace App\Http\Livewire\Complaint;

use Livewire\Component;
use App\Models\Complaint;

class Delete extends Component
{
    public $complaint;

    public $listeners = ['delete'];

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $this->complaint->id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $compl = Complaint::where('id', $id)->first();
        if ($compl != null) {
            $compl->delete();
            return redirect()->to('/complaint');
        }
        return redirect()->to('/complaint')->with('error', 'Something went wrong');
    }
    public function render()
    {
        return view('livewire.complaint.delete');
    }
}
