<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sms()
    {
        return view('reports.sms');
    }

    public function ticket()
    {
        return view('reports.ticket');
    }
}