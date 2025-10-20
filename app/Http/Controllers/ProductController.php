<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        return view('products.list');
    }

    public function addFeature()
    {
        return view('products.addFeature');
    }

    public function featureCategories()
    {
        return view('products.featureCategrories');
    }
}