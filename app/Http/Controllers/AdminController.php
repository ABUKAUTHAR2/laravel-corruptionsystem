<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\CorruptionReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;



class AdminController extends Controller
{
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }
    }

    
    public function dashboard()
    {
        // Fetch the last record to get its ID
        $lastReport = CorruptionReport::latest()->first();
    
        $regionWithMostCases = DB::table('corruption_reports')
            ->select('region', DB::raw('COUNT(*) as count'))
            ->groupBy('region')
            ->orderByDesc('count')
            ->first();
    
        $organizationWithMostCases = DB::table('corruption_reports')
            ->select('organization', DB::raw('COUNT(*) as count'))
            ->groupBy('organization')
            ->orderByDesc('count')
            ->first();
    
        $totalReports = $lastReport ? $lastReport->id : 0; // Get the last ID or default to 0
        $unprocessedReports = CorruptionReport::whereNull('name')->count();
        $totalUsers = CorruptionReport::whereNotNull('name')->count();
    
        return view('admin.dashboard', [
            'regionWithMostCases' => $regionWithMostCases,
            'organizationWithMostCases' => $organizationWithMostCases,
            'totalReports' => $totalReports,
            'unprocessedReports' => $unprocessedReports,
            'totalUsers' => $totalUsers,
        ]);
    }
    
    

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function logs()
    {
        return view('admin.logs');
    }
}
