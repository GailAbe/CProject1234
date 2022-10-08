<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests\Complaint\StoreRequest;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();

        return view('modules.complaint.index', compact('complaints'));
    }

    public function create()
    {
        return view('modules.complaint.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $complaint = Complaint::create([
            'complainant' => $validated['complainant'],
            'date_time' => $validated['date_time'],
            'witness' => $validated['witness'],
            'complaint_to' => $validated['complaint_to'],
            'notes' => $validated['notes'],
        ]);

        if (!$complaint) {
            return redirect()->back()->withError('Something went wrong');
        }
        return redirect()->route('complaint.index')->withSuccess('Complaint record added successfully');
    }

    public function settled($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->complaint_status = 'Settled';
        $complaint->save();

        return redirect()->route('complaint.index')->withSuccess('Complaint record set as settled successfully');
    }

    public function show(Request $request)
    {
        return view('modules.complaint.view');
    }

    public function edit(Request $request, $id)
    {
        return view('modules.complaint.edit');
    }
}
