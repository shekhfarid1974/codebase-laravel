<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function mailConfigure()
    {
        return view('settings.mail');
    }
    // Add other settings methods here as needed
}