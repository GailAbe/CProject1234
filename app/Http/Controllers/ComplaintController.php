<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('modules.complaint.index');
    }

    public function create()
    {
        return view('modules.complaint.create');
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
