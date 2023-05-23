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
        $vehicles = Vehicle::where('servicestatus', 'YES')->get();
        $vehiclecount = Count($vehicles);
        $reports = Report::where('feedback', null)->with('assign')->paginate(5);
        $reportcount = Count($reports);
        $assigns = Assign::whereNotNull('last_inspection')->where('overdue', 'YES')->get();
        $asigncounts = Count($assigns);

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
            if ($inspections->feedback == Null) {
                array_push($inspectionLists, $inspections);
            }
        }
        $inspectionListscount = Count($inspectionLists);
        return view('/dashboard', ['assigns' => $assigns, 'vehicles' => $vehicles, 'reports' => $reports, 'inspectionLists' => $inspectionLists, 'asigncounts' => $asigncounts, 'vehiclecount' => $vehiclecount, 'reportcount' => $reportcount, 'inspectionListscount' => $inspectionListscount]);
    }
}
