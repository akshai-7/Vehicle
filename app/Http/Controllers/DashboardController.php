<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Assign;
use App\Models\Inspection;
use App\Models\Report;
use App\Models\Visual;
use App\Models\Vehiclecheck;
use App\Models\Cabin;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $vehicles = Vehicle::paginate(5);
        $reports = Report::with('assign')->paginate(5);
        $assigns = Assign::whereNotNull('last_inspection')->paginate(5);
        // $visual = Visual::where('feedback', 'Damaged')->get();


        // $inspections = Inspection::with('visual')->get();
        // $visual = $inspections->visual;
        // dd($visual);
        return view('/dashboard', ['assigns' => $assigns, 'vehicles' => $vehicles, 'reports' => $reports]);
    }
}
