<?php

namespace App\Http\Livewire\Official;

use Livewire\Component;
use App\Models\Official;
use App\Services\Constant;

class ShowOfficial extends Component
{
    // public $officials;

    public $official_id;
    public $fullname;
    public $age;
    public $gender;
    public $contact_number;
    public $purok;
    public $position;

    protected $listeners = ['delete'];

    protected $rules = [
        'fullname' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'contact_number' => 'required',
        'purok' => 'required',
        'position' => 'required',
    ];

    public function resetInputFields()
    {
        $this->fullname = '';
        $this->age = '';
        $this->gender = '';
        $this->contact_number = '';
        $this->purok = '';
        $this->position = '';
    }

    public function edit($id)
    {
        $official = Official::find($id);

        $this->official_id = $id;
        $this->fullname = $official->fullname;
        $this->age = $official->age;
        $this->gender = $official->gender;
        $this->contact_number = $official->contact_number;
        $this->purok = $official->purok;
        $this->position = $official->position;
    }

    public function store()
    {
        $validated = $this->validate();

        $countChairman = Official::where('position', 'Brgy-Chairman')->count();
        $countKagawad = Official::where('position', 'Brgy-Kagawad')->count();
        $countTreasurer = Official::where('position', 'Brgy-Treasurer')->count();
        $countSecretary = Official::where('position', 'Brgy-Secretary')->count();
        $countSkChair = Official::where('position', 'Sk-Chairperson')->count();
        $countSkKagawad = Official::where('position', 'SK-Kagawad')->count();
        $countSkTreasurer = Official::where('position', 'SK-Treasurer')->count();
        $countSkSecretary = Official::where('position', 'SK-Secretary')->count();

        if ($validated['position'] == 'Brgy-Chairman' && $countChairman > 0) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Barangay Chairman must not exceed more than 1']);
        } elseif ($validated['position'] == 'Brgy-Treasurer' && $countTreasurer > 0) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Barangay Treasurer must not exceed more than 1']);
        } elseif ($validated['position'] == 'Brgy-Secretary' && $countSecretary > 0) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Barangay Secretary must not exceed more than 1']);
        } elseif ($validated['position'] == 'Brgy-Kagawad' && $countKagawad > 6) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Barangay Kagawad must not exceed more than 7']);
        } elseif ($validated['position'] == 'Sk-Chairperson' && $countSkChair > 0) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Sk Chairperson must not exceed more than 1']);
        } elseif ($validated['position'] == 'Sk-Treasurer' && $countSkTreasurer > 0) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Sk Treasurer must not exceed more than 1']);
        } elseif ($validated['position'] == 'Sk-Secretary' && $countSkSecretary > 0) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Sk Secretary must not exceed more than 1']);
        } elseif ($validated['position'] == 'Sk-Kagawad' && $countSkKagawad > 6) {
            $this->resetInputFields();
            $this->emit('hideModal', '#create');
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'Sk Kagawad must not exceed more than 7']);
        } else {
            $official = Official::create([
                'fullname' => $validated['fullname'],
                'age' => $validated['age'],
                'gender' => $validated['gender'],
                'contact_number' => $validated['contact_number'],
                'purok' => $validated['purok'],
                'position' => $validated['position'],
            ]);

            $this->resetInputFields();
            $this->emit('hideModal', '#create');

            $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully added a new Official']);
        }
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
        $positions = Constant::getPositions();

        return view('livewire.official.show-official', compact('officials', 'positions'));
    }
}
