<?php

namespace App\Http\Controllers;

use PDF;

use Illuminate\Http\Request;
use App\Models\CorruptionReport;


class ReportController extends Controller
{

public function index()
{
    $reports = CorruptionReport::all();

    return view('reports', compact('reports'));
}

public function destroy($id)
{
    $report = CorruptionReport::findOrFail($id);
    $report->delete();
    return redirect()->route('reports')->with('success', 'Report deleted successfully.');
}




public function generatePdf($id)
{
    $report = CorruptionReport::findOrFail($id);

    $pdf = PDF::loadView('pdf', ['report' => $report]);

    return $pdf->stream('report.pdf');
}

}