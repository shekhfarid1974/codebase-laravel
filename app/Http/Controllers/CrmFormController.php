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

    // Individual category form methods
    public function farmer(Request $request)
    {
        $phone_number = $request->get('phone_number', '01521204476');
        $agent = $request->get('agent', 'ShekhFarid');

        return view('crmform.inbound.farmer', [
            'phone_number' => $phone_number,
            'agent' => $agent,
            'title' => 'Farmer CRM Form',
        ]);
    }

    public function retailer(Request $request)
    {
        $phone_number = $request->get('phone_number', '01521204476');
        $agent = $request->get('agent', 'ShekhFarid');

        return view('crmform.inbound.retailer', [
            'phone_number' => $phone_number,
            'agent' => $agent,
            'title' => 'Retailer CRM Form',
        ]);
    }

    public function dealer(Request $request)
    {
        $phone_number = $request->get('phone_number', '01521204476');
        $agent = $request->get('agent', 'ShekhFarid');

        return view('crmform.inbound.dealer', [
            'phone_number' => $phone_number,
            'agent' => $agent,
            'title' => 'Dealer CRM Form',
        ]);
    }

    public function others(Request $request)
    {
        $phone_number = $request->get('phone_number', '01521204476');
        $agent = $request->get('agent', 'ShekhFarid');

        return view('crmform.inbound.others', [
            'phone_number' => $phone_number,
            'agent' => $agent,
            'title' => 'Others CRM Form',
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request based on category
        $category = $request->get('customer_category', 'Farmer');

        $validationRules = $this->getValidationRules($category);

        $validatedData = $request->validate($validationRules);

        // Your form processing logic here
        // For now, just return success
        return response()->json([
            'status' => 'success',
            'message' => ucfirst($category) . ' information saved successfully!',
            'data' => $validatedData
        ]);
    }

    public function getData(Request $request)
    {
        // Return empty data for DataTables
        return response()->json([
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
        ]);
    }

    public function getCategoryFields(Request $request)
    {
        $category = $request->get('category');
        $phone_number = $request->get('phone_number', '01521204476');
        $agent = $request->get('agent', 'ShekhFarid');

        switch ($category) {
            case 'Farmer':
                return view('crmform.inbound.farmer', [
                    'phone_number' => $phone_number,
                    'agent' => $agent,
                ]);
            case 'Retailer':
                return view('crmform.inbound.retailer', [
                    'phone_number' => $phone_number,
                    'agent' => $agent,
                ]);
            case 'Dealer':
                return view('crmform.inbound.dealer', [
                    'phone_number' => $phone_number,
                    'agent' => $agent,
                ]);
            case 'Others':
                return view('crmform.inbound.others', [
                    'phone_number' => $phone_number,
                    'agent' => $agent,
                ]);
            default:
                return view('crmform.inbound.farmer', [
                    'phone_number' => $phone_number,
                    'agent' => $agent,
                ]);
        }
    }

    /**
     * Get validation rules based on category
     */
    private function getValidationRules($category)
    {
        $commonRules = [
            'phone_number' => 'required|string',
            'agent' => 'required|string',
            'customer_category' => 'required|string',
        ];

        $categoryRules = [];

        switch ($category) {
            case 'Farmer':
                $categoryRules = [
                    'name' => 'required|string|max:255',
                    'alt_number' => 'required|string',
                    'gender' => 'required|string|in:male,female',
                    'district_id' => 'required|string',
                    'upazila_id' => 'required|string',
                    'union_id' => 'required|string',
                    'village' => 'required|string|max:255',
                ];
                break;

            case 'Retailer':
                $categoryRules = [
                    'retailer_name' => 'required|string|max:255',
                    'alt_number' => 'required|string',
                    'gender' => 'required|string|in:male,female',
                    'union_id' => 'required|string',
                    'village' => 'required|string|max:255',
                ];
                break;

            case 'Dealer':
                $categoryRules = [
                    'dealer_name' => 'required|string|max:255',
                    'alt_number' => 'required|string',
                    'gender' => 'required|string|in:male,female',
                    'upazila_id' => 'required|string',
                    'union_id' => 'required|string',
                    'village' => 'required|string|max:255',
                ];
                break;

            case 'Others':
                $categoryRules = [
                    'name' => 'required|string|max:255',
                    'gender' => 'required|string|in:male,female',
                    'upazila_id' => 'required|string',
                    'union_id' => 'required|string',
                    'village' => 'required|string|max:255',
                ];
                break;
        }

        return array_merge($commonRules, $categoryRules);
    }
}
