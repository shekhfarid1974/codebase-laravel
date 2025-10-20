<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function view()
    {
        return view('faqs.view');
    }

    public function add()
    {
        return view('faqs.add');
    }

    public function categories()
    {
        return view('faqs.categories');
    }
}