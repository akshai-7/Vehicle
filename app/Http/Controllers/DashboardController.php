<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Assign;
use App\Models\Inspection;
use App\Models\Report;
use App\Models\Visual;
use App\Models\Vehiclecheck;
use App\Models\Cabin;
use PHPUnit\Framework\Constraint\Count;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $vehicles = Vehicle::paginate(5);
        $reports = Report::with('assign')->paginate(5);
        $assigns = Assign::whereNotNull('last_inspection')->paginate(5);

        $visual = Visual::where('action', 'Bad')->get();
        $vehicle = Vehiclecheck::where('action', 'Bad')->get();
        $cabin = Cabin::where('action', 'Bad')->get();
        $inspectionsId = [];
        for (
            $i = 0;
            $i < Count($visual);
            $i++
        ) {
            if (in_array($visual[$i]->inspection_id, $inspectionsId)) {
            } else {
                array_push($inspectionsId, $visual[$i]->inspection_id);
            }
        }

        for (
            $i = 0;
            $i < Count($cabin);
            $i++
        ) {
            if (in_array($cabin[$i]->inspection_id, $inspectionsId)) {
            } else {
                array_push($inspectionsId, $cabin[$i]->inspection_id);
            }
        }
        for (
            $i = 0;
            $i < Count($vehicle);
            $i++
        ) {
            if (in_array($vehicle[$i]->inspection_id, $inspectionsId)) {
            } else {
                array_push($inspectionsId, $vehicle[$i]->inspection_id);
            }
        }
        $inspectionLists = [];
        for (
            $i = 0;
            $i < Count($inspectionsId);
            $i++
        ) {
            $inspections = Inspection::where('id', $inspectionsId[$i])->first();
            array_push($inspectionLists, $inspections);
        }
        return view('/dashboard', ['assigns' => $assigns, 'vehicles' => $vehicles, 'reports' => $reports, 'inspectionLists' => $inspectionLists]);
    }
}
