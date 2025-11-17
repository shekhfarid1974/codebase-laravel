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
    public function categoriesCreate()
    {
        return view('faqs.categories_create');
    }
    public function crop()
    {
        return view('faqs.crop');
    }
    public function cropsCreate()
    {
        return view('faqs.crop_create');
    }

    public function identification()
    {
        return view('faqs.identification');
    }

    public function identificationCreate()
    {
        return view('faqs.identification_create');
    }

}
