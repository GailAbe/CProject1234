<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        return view('modules.incident.index');
    }

    public function create()
    {
        return view('modules.incident.create');
    }

    public function show(Request $request)
    {
        return view('modules.incident.view');
    }

    public function edit(Request $request, $id)
    {
        return view('modules.incident.edit');
    }
}
