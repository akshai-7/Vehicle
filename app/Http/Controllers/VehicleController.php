<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\Vehicle;
use App\Models\Vehiclecheck;
use App\Models\Visual;
use App\Models\User;
use App\Models\Assign;
use App\Models\Inspection;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
            'service' => 'required',
        ]);
        $vehicle = new Vehicle();
        $vehicle->number_plate = $request['number_plate'];
        $vehicle->vehicle_type = $request['vehicle_type'];
        $vehicle->make = $request['make'];
        $vehicle->vehicle_model = $request['vehicle_model'];
        $vehicle->mileage = $request['mileage'];
        $date = $request['service'];
        $servicedate = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $vehicle->servicedate = $servicedate;
        $vehicle->nextservice = Carbon::parse($servicedate)->addYear(1)->format('Y/m/d');
        if (Carbon::today()->format('Y/m/d')   >= $vehicle->nextservice) {
            $vehicle->servicestatus = 'YES';
        } else {
            $vehicle->servicestatus = 'NO';
        }
        $vehicle->save();
        session()->flash('message', 'Vehicle is Created');
        return redirect('/vehiclelist');
    }
    public function vehiclelist()
    {
        $vehicles = Vehicle::paginate(10);
        $datas = Vehicle::get();
        return view('vehiclelist', compact('vehicles', 'datas'));
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
        $date = $request['service'];
        $servicedate = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $vehicle->servicedate = $servicedate;
        $vehicle->nextservice = Carbon::parse($servicedate)->addYear(1)->format('Y-m-d');
        if (Carbon::today()->format('Y-m-d')   >= $vehicle->nextservice) {
            $vehicle->servicestatus = 'YES';
        } else {
            $vehicle->servicestatus = 'NO';
        }

        $vehicle->save();
        if ($request->path == 'Dashboard') {
            session()->flash('message', 'Service Date Updated');
            return redirect('/dashboard');
        } else {
            session()->flash('message', 'Updated Successfully');
            return redirect('/vehiclelist');
        }
    }
    public function remove($id)
    {
        $id = Vehicle::where('id', $id)->first();
        $vehicle_id = $id->id;

        $assign = Assign::where('vehicle_id', $vehicle_id)->first();
        if ($assign == null) {
            $id->delete();
        } else {
            Assign::where('vehicle_id', $vehicle_id)->delete();
            $user = User::where('vehicle_id', $vehicle_id)->first();
            $user->vehicle_id = null;
            $user->vehicle_no = null;
            $user->save();
            $id->delete();
        }
        session()->flash('message1', ' Vehicle Deleted');
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

    public function vehiclelists(Request $request)
    {
        $datas = Vehicle::get();
        if ($request->number_plate == "Select Number plate") {
            $vehicles = Vehicle::paginate();
        } elseif ($request->number_plate != "Select Number plate") {
            $vehicles = Vehicle::where('number_plate', $request->number_plate)->paginate(10);
        }
        return view('vehiclelist', compact('vehicles', 'datas'));
    }
    public function searchbar(Request $request)
    {
        $datas = Vehicle::get();
        $query = $request['query'];
        $vehicles = Vehicle::where('vehicle_type', 'LIKE', "%$query%")
            ->orWhere('make', 'LIKE', "%$query%")
            ->orWhere('vehicle_model', 'LIKE', "%$query%")
            ->paginate(10);
        return view('/vehiclelist', compact('vehicles', 'datas'));
    }
}
