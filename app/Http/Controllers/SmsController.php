<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function feature()
    {
        return view('sms.feature');
    }

    public function brochure()
    {
        return view('sms.brochure');
    }

    public function templates()
    {
        return view('sms.templates');
    }

    public function sendBulk()
    {
        return view('sms.sendBulk');
    }
}