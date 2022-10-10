<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrashbinController extends Controller
{
    public function index()
    {
        return view('modules.household.index');
    }

}

