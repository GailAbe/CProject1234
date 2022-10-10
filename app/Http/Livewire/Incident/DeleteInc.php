<?php

namespace App\Http\Livewire\Incident;

use Livewire\Component;
use App\Models\Incident;

class DeleteInc extends Component
{
    public $incident;

    public $listeners = ['delete'];

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $this->incident->id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $incids = Incident::where('id', $id)->first();
        if ($incids != null) {
            $incids->delete();
            return redirect()->to('/incident');
        }
        return redirect()->to('/incident')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.incident.delete-inc');
    }
}
