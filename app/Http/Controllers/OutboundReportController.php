<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutboundReportController extends Controller
{
    public function index()
    {
        return view('outbound_reports.index');
    }
}
