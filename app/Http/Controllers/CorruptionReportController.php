<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorruptionReport;


class CorruptionReportController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'nullable|required_if:submit-details,true|string',
            'email' => 'nullable|required_if:submit-details,true|email',
            'region' => 'required|string',
            'organization' => 'required|string',
            'incident' => 'required|string',
            'files.*' => 'nullable|file',
        ]);
    
        // Handle file uploads and store with unique file names
        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Generate a unique file name
                $fileName = uniqid() . '_' . $file->getClientOriginalName(); // This appends a unique ID to the original file name
    
                // Store the file with the generated unique name
                $filePath = $file->storeAs('public/files', $fileName);
    
                $filePaths[] = $fileName;
            }
        }
    
        // Create a new CorruptionReport model and save it to the database
        $corruptionReport = new CorruptionReport();
        $corruptionReport->name = $request->input('name');
        $corruptionReport->email = $request->input('email');
        $corruptionReport->region = $request->input('region');
        $corruptionReport->organization = $request->input('organization');
        $corruptionReport->incident = $request->input('incident');
        $corruptionReport->file_paths = json_encode($filePaths); // Save the unique file names
        $corruptionReport->save();

        session()->flash('success', 'Your report has been successfully submitted to the system. Wait for further follow-ups.');

    // Redirect the user to the success page
    return redirect()->route('success');
    }
    
    public function success()
    {
        return view('success');
    }
}
