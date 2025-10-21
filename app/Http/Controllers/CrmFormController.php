<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrmFormController extends Controller
{
    public function create(Request $request)
    {
        $phone_number = $request->get('phone_number', '01521204476');
        $agent = $request->get('agent', 'ShekhFarid');
        
        return view('crmform.crmform', [
            'phone_number' => $phone_number,
            'agent' => $agent,
            'title' => 'CRM Form',
            'data' => null,
        ]);
    }

    public function store(Request $request)
    {
        // Your form processing logic here
        // For now, just return success
        return response()->json([
            'status' => 'success',
            'message' => 'Customer information saved successfully!'
        ]);
    }

    public function getData(Request $request)
    {
        // Return empty data for DataTables
        return response()->json([
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        ]);
    }
}