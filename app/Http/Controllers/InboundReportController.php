<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboundReportController extends Controller
{
    public function index()
    {
        return view('inbound_reports.index');
    }
}
