<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrmController extends Controller
{
    /**
     * Display the Farmer CRM page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // You can pass data to the view here if needed in the future
        // $farmers = Farmer::all(); // Example
        // return view('crm.index', compact('farmers'));

        // For now, just return the view
        return view('crm.index');
    }
}