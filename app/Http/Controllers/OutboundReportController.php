<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutboundReportController extends Controller
{
    // Show the questionnaire page
    public function questionnaire()
    {
        return view('outbound_reports.questionnaire');
    }

    // Show the general survey form
    public function showForm()
    {
        return view('outbound_reports.general-survey'); // Correct view path
    }

    // Handle the survey form submission
    public function submitSurvey(Request $request)
    {
        // Validate the incoming form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'land_size' => 'required|string|max:255',
            'main_crop' => 'required|string|max:255',
            'heard_auto_crop_care' => 'required|in:yes,no',
            'use_auto_crop_care_product' => 'required|in:yes,no',
            'feedback' => 'nullable|string|max:1000',
            'products_used' => 'nullable|string|max:255',
            'product_details' => 'nullable|string|max:1000',
        ]);

        // Process or save the data, here we're just returning the validated data
        return response()->json($validated);
    }

    public function feedbackSurvey()
    {
        return view('outbound_reports.feedback-survey');
    }
}
