<?php

namespace App\Http\Livewire\Household;

use Livewire\Component;
use App\Models\Household;
use App\Services\Constant;
use PhpOffice\PhpWord\TemplateProcessor;
use Termwind\Components\Dd;

class Export extends Component
{
    public $households;

    public function export()
    {
        $path = storage_path(Constant::TEMPLATE_PATH_HOUSEHOLD);
        $templateProcessor = new TemplateProcessor($path);

        $household = Household::with('members')->orderBy('household_number')->get();

        $this->households = $household;

        // get the  members only from household
        $members = $household->pluck('members')->flatten();

        $count = $this->households->count();
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

        $templateProcessor->saveAs($tempPath);
        // if folder does not exist, create it
        if (!file_exists(storage_path('app/public/reports'))) {
            mkdir(storage_path('app/public/reports'), 0777, true);
        }

        // rename(storage_path('app/' . $tempPath), storage_path('app/public/' . $tempPath));

        return response()->download(storage_path('app/public/' . $tempPath));

        // return response()->download(public_path($tempPath));
    }

    public function render()
    {
        return view('livewire.household.export');
    }
}
