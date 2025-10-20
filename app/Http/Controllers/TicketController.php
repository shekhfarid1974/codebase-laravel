<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function all()
    {
        return view('tickets.all');
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function resolved()
    {
        return view('tickets.resolved');
    }
}