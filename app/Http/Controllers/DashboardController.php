<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // You can pass data to the view here if needed in the future
        // $data = [...];
        // return view('dashboard.index', $data);

        // For now, just return the view
        return view('dashboard.index');
    }
}