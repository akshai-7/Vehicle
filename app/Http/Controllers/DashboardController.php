<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Assign;
use App\Models\Report;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $vehicles = Vehicle::paginate(5);
        $reports = Report::with('assign')->paginate(5);
        $assigns = Assign::whereNotNull('last_inspection')->paginate(5);
        return view('/dashboard', ['assigns' => $assigns, 'vehicles' => $vehicles, 'reports' => $reports]);
    }
}
