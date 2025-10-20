<?php
// App\Http\Controllers\CrmController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index(Request $request)
    {
        $phoneNumber = $request->query('phone_number');
        $agent = $request->query('agent');

        // You could potentially fetch customer data here based on $phoneNumber
        // $customerData = Customer::where('mobile_number', $phoneNumber)->first();
        // Then pass $customerData to the view

        // For now, just pass the parameters to the view
        return view('crm.index', compact('phoneNumber', 'agent'));
    }
}