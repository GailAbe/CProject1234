<?php

namespace App\Http\Livewire\Official;

use Livewire\Component;
use App\Models\Official;

class ShowOfficial extends Component
{
    // public $officials;

    public $official_id;
    public $fullname;
    public $position;

    protected $listeners = ['delete'];

    protected $rules = [
        'fullname' => 'required',
        'position' => 'required',
    ];

    public function resetInputFields()
    {
        $this->fullname = '';
        $this->position = '';
    }

    public function edit($id)
    {
        $official = Official::find($id);

        $this->official_id = $id;
        $this->fullname = $official->fullname;
        $this->position = $official->position;
    }

    public function store()
    {
        $validated = $this->validate();

        $official = Official::create([
            'fullname' => $validated['fullname'],
            'position' => $validated['position'],
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#create');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully added a new Official']);
    }

    public function update()
    {
        $official = Official::find($this->official_id);

        $validated = $this->validate();
        $official->update($validated);
        $this->resetInputFields();
        $this->emit('hideModal', '#edit');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully added a new Official']);
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $official = Official::where('id', $id)->first();
        if ($official != null) {
            $official->delete();
        }
    }

    public function render()
    {
        $officials = Official::all();
        return view('livewire.official.show-official', compact('officials'));
    }
}
