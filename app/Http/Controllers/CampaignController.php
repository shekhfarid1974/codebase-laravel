<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function active()
    {
        return view('campaigns.active');
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function archive()
    {
        return view('campaigns.archive');
    }
}