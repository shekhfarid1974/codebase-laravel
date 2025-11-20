<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutboundCrmFormController extends Controller
{

    public function formType(Request $request,$type)
    {
        $phone_number = $request->get('phone_number', '01521204476');
        $agent = $request->get('agent', 'ShekhFarid');

        if ($type == 'navara-campaign') {
            $view = 'crmform.navara-campaign';
            $title = 'Navara Campaign - Outbound';
        }
        if ($type == 'general-survey') {
            $view = 'crmform.general-survey';
            $title = 'General Survey - Outbound';
        }
        if ($type == 'meeting-feedback') {
            $view = 'crmform.meeting-feedback';
            $title = 'Meeting Feedback - Outbound';
        }
        return view($view, [
            'phone_number' => $phone_number,
            'agent' => $agent,
            'title' => $title,
            'data' => null,
        ]);

    }
}
