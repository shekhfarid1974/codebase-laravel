<?php

namespace App\Http\Controllers;

class CrmController extends Controller
{
    public function farmer()
    {
        return view('crm.farmer.index');
    }

    public function dealer()
    {
        return view('crm.dealer.index');
    }

    public function retailer()
    {
        return view('crm.retailer.index');
    }

    public function other()
    {
        return view('crm.other.index');
    }

    public function campaign()
    {
        return view('crm.campaign.index');
    }

    public function surveyLead()
    {
        return view('crm.survey.lead');
    }

    public function surveyReports()
    {
        return view('crm.survey.reports');
    }
}
