<?php

namespace App\Http\Livewire\Official;

use Livewire\Component;
use App\Models\Official;

class TrashOfficial extends Component
{
    public $official;

    protected $listeners = ['restore', 'forceDelete'];

    public function restoreConfirm()
    {
        $this->dispatchBrowserEvent('swal:restore', [
            'id' => $this->official->id,
            'message' => 'Are you sure to restore?'
        ]);
    }

    public function restore($id)
    {
        $official = Official::onlyTrashed()->where('id', $id)->first();
        if ($official != null) {
            $official->restore();
            return redirect()->route('trashbin.index')->with('success', 'Official has been successfully restored');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong! Official cannot be restored');
    }

    public function forceDelConfirm()
    {
        $this->dispatchBrowserEvent('swal:forceDel', [
            'id' => $this->official->id,
            'message' => 'Are you sure to delete permanently?'
        ]);
    }

    public function forceDelete($id)
    {
        $official = Official::onlyTrashed()->where('id', $id)->first();
        if ($official != null) {
            $official->forceDelete();
            return redirect()->route('trashbin.index')->with('success', 'Official has been deleted permanently!');
        }
        return redirect()->route('trashbin.index')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.official.trash-official');
    }
}
