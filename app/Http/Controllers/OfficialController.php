<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficialController extends Controller
{
    public function index()
    {
        return view('modules.official.index');
    }

    public function create()
    {
        return view('modules.official.create');
    }

    public function show(Request $request)
    {
        return view('modules.official.view');
    }

    public function edit(Request $request, $id)
    {
        return view('modules.official.edit');
    }
}
