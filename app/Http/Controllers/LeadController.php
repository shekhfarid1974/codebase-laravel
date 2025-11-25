<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\CssSelector\Parser\Reader;

class LeadController extends Controller
{
    public function import()
    {
        return view('leads.import');
    }

    public function storeImport(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:10240',
            'import_type' => 'required|in:new,update,replace'
        ]);

        // Handle file import logic here
        $file = $request->file('file');
        $path = $file->store('imports', 'local');
        
        // Process the CSV file
        $csv = Reader::createFromPath(storage_path("app/{$path}"), 'r');
        $csv->setHeaderOffset(0);
        
        $records = $csv->getRecords();
        
        foreach($records as $record) {
            // Process each lead record
            // Save to database based on import_type
        }

        return redirect()->route('leads.import')->with('success', 'Leads imported successfully!');
    }

    public function reset()
    {
        return view('leads.reset');
    }

    public function destroyAll(Request $request)
    {
        if ($request->confirmation !== 'CONFIRM') {
            return redirect()->back()->withErrors(['confirmation' => 'Please type CONFIRM to proceed']);
        }

        // Delete all leads logic here
        // Lead::truncate();

        return redirect()->route('leads.reset')->with('success', 'All leads have been reset!');
    }

    public function downloadTemplate()
    {
        $headers = ['Name', 'Phone', 'Email', 'Address', 'Source', 'Status'];
        $filename = 'lead_template.csv';
        
        $callback = function() use ($headers) {
            $FH = fopen('php://output', 'w');
            fputcsv($FH, $headers);
            fclose($FH);
        };
        
        return response()->streamDownload($callback, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}