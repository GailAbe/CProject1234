<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Requests\Incident\StoreRequest;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();
        return view('modules.incident.index', compact('incidents'));
    }

    public function create()
    {
        return view('modules.incident.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $incident = Incident::create([
            'victim' => $validated['victim'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'cause' => $validated['cause'],
            'incident_description' => $validated['incident_description'],
            'injury' => $validated['injury'],
            'person_involved' => $validated['person_involved']
        ]);

        if (!$incident) {
            return back()->withErrors('Something went wrong!');
        }

        return redirect()->route('incident.index')->withSuccess('Incident report created successfully');
    }

    public function edit(Request $request, $id)
    {
        $incident = Incident::where('id', $id)->first();

        return view('modules.incident.edit', compact('incident'));
    }

    public function update(StoreRequest $request, $id)
    {
        $validated = $request->validated();

        $incident = Incident::where('id', $id)->first();

        $incident->update([
            'victim' => $validated['victim'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'cause' => $validated['cause'],
            'incident_description' => $validated['incident_description'],
            'injury' => $validated['injury'],
            'person_involved' => $validated['person_involved']
        ]);

        if (!$incident) {
            return back()->withErrors('Something went wrong!');
        }

        return redirect()->route('incident.index')->withSuccess('Incident Record updated Successfully!');
    }

    public function show(Request $request, $id)
    {
        $incident = Incident::where('id', $id)->first();

        return view('modules.incident.view', compact('incident'));
    }
}
