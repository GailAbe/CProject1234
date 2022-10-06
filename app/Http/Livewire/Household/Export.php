<?php

namespace App\Http\Livewire\Household;

use Livewire\Component;
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
        $this->households->load('members');

        // dd($this->households);
        $count = $this->households->count();

        if ($count > 0) {
            $templateProcessor->cloneRow('n', $count);
            $i = 1;
            foreach ($this->households as $key => $household) {
                $templateProcessor->setValue('n#' . $i, $i);
                $templateProcessor->setValue('h_number#' . ($key + 1), $household->household_number);
                $templateProcessor->setValue('purok#' . ($key + 1), $household->purok_name);
                $templateProcessor->setValue('fhead#' . ($key + 1), $household->fhead_name);
                $templateProcessor->setValue('gend#' . ($key + 1), $household->fhead_gender);
                $templateProcessor->setValue('bdate#' . ($key + 1), $household->fhead_bdate);
                $templateProcessor->setValue('status#' . ($key + 1), $household->fhead_cstatus);
                $i++;
                // foreach ($household->members as $key => $member) {
                //     $templateProcessor->setValue('mn#' . $i, $i);
                //     $templateProcessor->setValue('mname#' . ($key + 1), $member->fullname);
                //     $templateProcessor->setValue('mpurok#' . ($key + 1), $member->purok_name);
                //     $templateProcessor->setValue('mgend#' . ($key + 1), $member->gender);
                //     $templateProcessor->setValue('mbdate#' . ($key + 1), $member->bdate);
                //     $templateProcessor->setValue('mstatus#' . ($key + 1), $member->cstatus);

                //     $i++;
                // }
            }
        }

        $filename = 'household-' . date('Y-m-d-h-i-s-a');
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }

    public function render()
    {
        return view('livewire.household.export');
    }
}
