<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get total counts
        $totalDoctors = Doctor::count();
        $totalPatients = Patient::count();
        
        // Get active doctors (you may want to add an 'active' column to doctors table)
        $activeDoctors = Doctor::count(); // For now, assuming all doctors are active
        
        // Get new patients this month
        $newPatients = Patient::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
        // Get recent doctors and patients
        $recentDoctors = Doctor::latest()->take(5)->get();
        $recentPatients = Patient::latest()->take(5)->get();
        
        return view('home', compact(
            'totalDoctors',
            'totalPatients',
            'activeDoctors',
            'newPatients',
            'recentDoctors',
            'recentPatients'
        ));
    }
}
