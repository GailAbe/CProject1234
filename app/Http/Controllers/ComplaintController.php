<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {

        return view('modules.complaints.index');
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        return view();
    }

    public function update(Request $request, $id)
    {
        return view();
    }
}
