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

    public function surveyLead()
    {
        return view('survey.lead');
    }

    public function surveyReports()
    {
        return view('survey.reports');
    }
}