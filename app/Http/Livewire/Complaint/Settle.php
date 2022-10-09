<?php

namespace App\Http\Livewire\Complaint;

use App\Models\Complaint;
use Livewire\Component;

class Settle extends Component
{
    public $complaint;

    public $listeners = ['settle'];

    public function settleConfirm()
    {
        $this->dispatchBrowserEvent('swal:settleconfirm', [
            'id' => $this->complaint->id,
            'message' => 'Are you sure?'
        ]);
    }

    public function settle($id)
    {
        $complaint = Complaint::where('id', $id)->first();

        if ($complaint != null) {
            $complaint->complaint_status = 'Settled';
            $complaint->save();
            return redirect()->to('/complaint')->with('success', 'Complaint record set as settled successfully!');
        }
        return redirect()->to('/complaint')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.complaint.settle');
    }
}
