<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        return view('products.list');
    }

    public function addProduct()
    {
        return view('products.addProduct');
    }

    public function addCategory()
    {
        return view('products.addCategory');
    }
}