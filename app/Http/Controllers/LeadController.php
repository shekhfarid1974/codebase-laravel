<?php

namespace App\Http\Controllers;

class LeadController extends Controller
{
    public function import()
    {
        return view('leads.import');
    }

    public function reset()
    {
        return view('leads.reset');
    }
}
