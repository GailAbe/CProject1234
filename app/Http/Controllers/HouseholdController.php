<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\Household\StoreRequest;
use App\Http\Requests\Household\UpdateRequest;

class HouseholdController extends Controller
{
    public function index()
    {
        // sort by household_number
        $households = Household::with('members')->orderBy('household_number')->get();

        return view('modules.household.index', compact('households'));
    }

    public function create()
    {
        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5'];
        $genders = ['Male', 'Female'];
        $cstatus = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];

        return view('modules.household.create', compact('puroks', 'genders', 'cstatus'));
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $household = Household::create([
            'household_number' => $validated['household_number'],
            'purok_name' => $validated['purok_name'],
            'fhead_name' => $validated['fhead_name'],
            'fhead_gender' => $validated['fhead_gender'],
            'fhead_bdate' => $validated['fhead_bdate'],
            'fhead_bplace' => $validated['fhead_bplace'],
            'fhead_cstatus' => $validated['fhead_cstatus'],
        ]);

        foreach ($validated['fullname'] as $key => $value) {
            $household->members()->create([
                'fullname' => $validated['fullname'][$key],
                'gender' => $validated['gender'][$key],
                'bdate' => $validated['bdate'][$key],
                'bplace' => $validated['bplace'][$key],
                'cstatus' => $validated['cstatus'][$key]
            ]);
        }

        return redirect()->route('household.index')->withSuccess('Household record added successfully');
    }

    public function show($id)
    {
        $household = Household::with('members')->findOrFail($id);
        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5'];
        $genders = ['Male', 'Female'];
        $cstatus = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];
        return view('modules.household.view', compact('household', 'puroks', 'genders', 'cstatus'));
    }

    public function edit($id)
    {
        $household = Household::with('members')->findOrFail($id);
        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5'];
        $genders = ['Male', 'Female'];
        $cstatus = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];

        return view('modules.household.edit', compact('household', 'puroks', 'genders', 'cstatus'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $household = Household::with('members')->findOrFail($id);

        // dd($household);
        $household->update(Arr::only($validated, [
            'household_number',
            'purok_name',
            'fhead_name',
            'fhead_gender',
            'fhead_bdate',
            'fhead_bplace',
            'fhead_cstatus'
        ]));


        $hhold = $household->members()->pluck('id');

        $deletedIds = $hhold->diff($validated['memberId'])->toArray();
        if ($deletedIds) {
            $household->members()->whereIn('id', $deletedIds)->delete();
        }
        foreach ($validated['memberId'] as $key => $housemem) {
            if (!$housemem) {
                $household->members()->create([
                    'fullname' => $validated['fullname'][$key],
                    'gender' => $validated['gender'][$key],
                    'bdate' => $validated['bdate'][$key],
                    'bplace' => $validated['bplace'][$key],
                    'cstatus' => $validated['cstatus'][$key]
                ]);
            } else {
                $household->members()->where('id', $housemem)->update([
                    'fullname' => $validated['fullname'][$key],
                    'gender' => $validated['gender'][$key],
                    'bdate' => $validated['bdate'][$key],
                    'bplace' => $validated['bplace'][$key],
                    'cstatus' => $validated['cstatus'][$key]
                ]);
            }
        }

        return redirect()->route('household.index')->withSuccess('Household record updated successfully');
    }
}
