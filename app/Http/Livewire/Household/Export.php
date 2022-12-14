<?php

namespace App\Http\Livewire\Household;

use Livewire\Component;
use App\Models\Official;
use App\Models\Household;
use App\Services\Constant;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{
    public $households;

    public function export()
    {
        $path = storage_path(Constant::TEMPLATE_PATH_HOUSEHOLD);
        $templateProcessor = new TemplateProcessor($path);

        $household = Household::with('members')->orderBy('household_number')->get();
        $officials = Official::get();
        $skTreasurer = $officials->where('position', 'Sk-Secretary')->first();
        $skChairperson = $officials->where('position', 'Sk-Chairperson')->first();

        $this->households = $household;

        // get the  members only from household
        $members = $household->pluck('members')->flatten();

        $count = $this->households->count();

        if ($count <= 0) {
            $this->dispatchBrowserEvent('swalError', ['message' => 'No household record found!']);
            return redirect(route('household.index'));
        }

        $memcount = $members->count();

        if ($count > 0) {
            if ($memcount > 0) {
                $templateProcessor->cloneRow('n', $memcount);
                $i = 1;

                foreach ($members as $key => $member) {
                    $templateProcessor->setValue('n#' . ($key + 1), $i);
                    $templateProcessor->setValue('name#' . ($key + 1), $member->fullname);
                    $templateProcessor->setValue('gend#' . ($key + 1), $member->gender);
                    $templateProcessor->setValue('bdate#' . ($key + 1), $member->bdate);
                    $templateProcessor->setValue('status#' . ($key + 1), $member->cstatus);
                    $templateProcessor->setValue('h_number#' . ($key + 1), $household->where('id', $member->household_id)->first()->household_number);
                    $templateProcessor->setValue('purok#' . ($key + 1), $household->where('id', $member->household_id)->first()->purok_name);

                    $i++;
                }
            }
        }

        $filename = 'household-' . date('Y-m-d-h-i-s-a');
        $tempPath = 'reports/' . $filename . '.docx';

        // save the file, if folder not exist create it
        if (!file_exists(storage_path('reports'))) {
            mkdir(storage_path('reports'), 0777, true);
        }

        $templateProcessor->saveAs(storage_path($tempPath));
        return response()->download(storage_path($tempPath));
    }

    public function render()
    {
        return view('livewire.household.export');
    }
}
