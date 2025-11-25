<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboundReportController extends Controller
{
    public function index()
    {
        return view('inbound_reports.index');
    }
    public function farmer()
    {
        return view('inbound_reports.farmer_report');
    }
    public function retailer()
    {
        return view('inbound_reports.retailer_report');
    }
    public function dealer()
    {
        return view('inbound_reports.dealer_report');
    }
    public function others()
    {
        return view('inbound_reports.others_report');
    }
}
