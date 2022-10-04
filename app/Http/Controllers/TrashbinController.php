<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrashbinController extends Controller
{
    public function index()
    {
        return view('modules.household.index');
    }

    public function create()
    {
        return view('modules.household.create');
    }

    public function show(Request $request)
    {
        return view('modules.household.view');
    }

    public function edit(Request $request, $id)
    {
        return view('modules.household.edit');
    }
}

