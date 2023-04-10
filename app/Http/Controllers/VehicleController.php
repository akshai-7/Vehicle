<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\Vehicle;
use App\Models\Vehiclecheck;
use App\Models\Visual;
use App\Models\Inspection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class VehicleController extends Controller
{
    public function createvehicle(Request $request)
    {
        $request->validate([
            'number_plate' => 'required',
            'make' => 'required',
            'vehicle_type' => 'required',
            'vehicle_model' => 'required',
            'mileage' => 'required',
        ]);
        $vehicle = new Vehicle();
        $vehicle->number_plate = $request['number_plate'];
        $vehicle->vehicle_type = $request['vehicle_type'];
        $vehicle->make = $request['make'];
        $vehicle->vehicle_model = $request['vehicle_model'];
        $vehicle->mileage = $request['mileage'];
        $vehicle->save();
        session()->flash('message', 'Vehicle is Created');
        return redirect('/vehiclelist');
    }
    public function vehiclelist()
    {

        $vehicles = Vehicle::paginate(5);
        return view('vehiclelist', compact('vehicles'));
    }

    public function updatevehicles($id)
    {
        $vehicle = Vehicle::where('id', $id)->get();
        return view('/updatevehicle', ['vehicle' => $vehicle]);
    }
    public function updatevehicle(Request $request, $id)
    {
        $request->validate([
            'number_plate' => 'required',
            'vehicle_type' => 'required',
            'vehicle_model' => 'required',
            'mileage' => 'required',
        ]);
        $id = $request->id;
        $vehicle1 = Vehicle::find($id);
        if ($vehicle1 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $vehicle = Vehicle::where('id', $id)->first();
        $vehicle->number_plate = $request['number_plate'];
        $vehicle->vehicle_type = $request['vehicle_type'];
        $vehicle->make = $request['make'];
        $vehicle->vehicle_model = $request['vehicle_model'];
        $vehicle->mileage = $request['mileage'];
        $vehicle->save();
        session()->flash('message', 'Updated Successfully');
        return redirect('/vehiclelist');
    }
    public function remove($id)
    {
        Vehicle::find($id)->delete();
        session()->flash('message1', ' Vehicle is Deleted');
        return redirect('/vehiclelist');
    }

    //summary
    public function summary($inspection_id)
    {
        $inspection = Inspection::where('id', $inspection_id)->get();
        $visual = Visual::where('inspection_id', $inspection_id)->get();
        $vehicle = Vehiclecheck::where('inspection_id', $inspection_id)->get();
        $cabin = Cabin::where('inspection_id', $inspection_id)->get();
        return view('/summary', ['inspection' => $inspection, 'cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle]);
    }

    public function pdf($inspection_id)
    {

        $visual = Visual::where('inspection_id', $inspection_id)->get();
        $vehicle = Vehiclecheck::where('inspection_id', $inspection_id)->get();
        $cabin = Cabin::where('inspection_id', $inspection_id)->get();
        $pdf = Pdf::loadView('M&d-foundations', ['cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle]);
        return $pdf->download('M&d-foundations.pdf');
    }
    public function edit($inspection_id)
    {
        return redirect('/details/' . $inspection_id);
    }
}
