<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Official;
use App\Models\Complaint;
use App\Models\Household;
use Illuminate\Http\Request;

class TrashbinController extends Controller
{
    public function index()
    {
        $households = Household::onlyTrashed()->get();
        $complaints = Complaint::onlyTrashed()->get();
        $incidents = Incident::onlyTrashed()->get();
        $officials = Official::onlyTrashed()->get();

        return view('trashbin.index', compact('households', 'complaints', 'incidents', 'officials'));
    }
}
