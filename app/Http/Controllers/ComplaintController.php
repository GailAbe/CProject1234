<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\Complaint\StoreRequest;
use App\Http\Requests\Complaint\UpdateRequest;
use App\Models\Complaint_image;


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

    public function edit(Request $request, $id)
    {
        $complaint = Complaint::where('id', $id)->first();

        return view('modules.complaint.edit', compact('complaint'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $complaint = Complaint::where('id', $id)->first();

        $complaint->update([
            'complainant' => $validated['complainant'],
            'date_time' => $validated['date_time'],
            'witness' => $validated['witness'],
            'notes' => $validated['notes'],
        ]);

        if (!$complaint) {
            return back()->withErrors('Something wrong');
        }
        return redirect()->route('complaint.index')->withSuccess('Complaint Record updated successfully!');
    }

    public function show(Request $request, $id)
    {
        $complaint = Complaint::with('images')->where('id', $id)->first();

        $image = $complaint->images->image_path ?? 'no-image.jpg';

        return view('modules.complaint.view', compact('complaint', 'image'));
    }

    public function settleImageStore(Request $request, $id)
    {
        // dd($request->all());

        $complaint = Complaint::with('images')->where('id', $id)->first();

        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);

        $complaint_image = time() . '-' . $validated['image']->getClientOriginalName() . '.' . $validated['image']->extension();

        if (!file_exists(public_path('images'))) {
            mkdir(public_path('images'), 0777, true);
        }

        $validated['image']->move(public_path('images'), $complaint_image);

        if ($complaint != null) {
            $complaint->complaint_status = 'Settled';
            $complaint->images()->create([
                'image_path' => $complaint_image,
            ]);
            $complaint->save();
            return redirect()->back()->with('success', 'Complaint record set as settled successfully!');
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }
}
