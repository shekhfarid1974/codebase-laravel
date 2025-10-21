<?php

// Custom Helper Functions for CRM Application

if (!function_exists('constants')) {
    function constants($key = null)
    {
        $constants = [
            'GENDER' => [
                'Male' => 'Male',
                'Female' => 'Female',
                'Other' => 'Other'
            ],
            
            'CUSTOMER_TYPES' => [
                'Farmer' => 'Farmer',
                'Dealer' => 'Dealer',
                'Retailer' => 'Retailer',
                'Others' => 'Others'
            ],
            
            'LEAD_STATUS' => [
                'Interested' => 'Interested',
                'Not Interested' => 'Not Interested',
                'Callback' => 'Callback'
            ],
            
            'LEAD_SOURCE' => [
                'Farmer Meeting' => 'Farmer Meeting',
                'IFS' => 'IFS',
                'Website' => 'Website'
            ],
            
            'EXISTING_CUSTOMER' => [
                'Yes' => 'Yes',
                'No' => 'No'
            ]
        ];
        
        if ($key) {
            return $constants[$key] ?? null;
        }
        
        return $constants;
    }
}

if (!function_exists('gender_options')) {
    function gender_options()
    {
        return constants('GENDER');
    }
}

if (!function_exists('customer_types')) {
    function customer_types()
    {
        return constants('CUSTOMER_TYPES');
    }
}

if (!function_exists('lead_status_options')) {
    function lead_status_options()
    {
        return constants('LEAD_STATUS');
    }
}

if (!function_exists('lead_source_options')) {
    function lead_source_options()
    {
        return constants('LEAD_SOURCE');
    }
}

if (!function_exists('existing_customer_options')) {
    function existing_customer_options()
    {
        return constants('EXISTING_CUSTOMER');
    }
}