<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Mail\taskmail;
use Illuminate\Support\Facades\Mail;

class AssignController extends Controller
{
    public function vehicleassignlist(Request $request)
    {
        $number_plate = $request['number_plate'];
        $name = $request['name'];
        $user = User::where('name', $name)->first();
        $vehicle = Vehicle::where('number_plate', $number_plate)->first();
        $assign = new Assign();
        $assign->user_id = $user->id;
        $assign->name = $user->name;
        $assign->email = $user->email;
        $assign->mobile = $user->mobile;
        $assign->vehicle_id = $vehicle->id;
        $assign->number_plate = $vehicle->number_plate;
        $assign->mileage = $vehicle->mileage;
        $assign->save();

        $user = User::where('name', $name)->first();
        $user->vehicle_id = $vehicle->id;
        $user->vehicle_no = $vehicle->number_plate;
        $user->save();

        $vehicle = Vehicle::where('number_plate', $number_plate)->first();
        $vehicle->user_id = $user->id;
        $vehicle->name = $user->name;
        $vehicle->save();

        $mailData = [
            'name' => $user->name,
            'number_plate' => $vehicle->number_plate,
        ];
        Mail::To($user->email)->send(new taskmail($mailData));
        session()->flash('message', 'Vehicle Assigned is Successfully');
        return redirect('/vehicleassignedlist');
    }
    public function vehicleassignedlist()
    {
        $role = 'user';
        $vehicle_id = null;
        $user = User::where('role', $role)->where('vehicle_id', $vehicle_id)->get();
        $user_id = null;
        $vehicle = Vehicle::where('user_id', $user_id)->get();
        $assigns = Assign::paginate(10);
        $datas = Assign::get();
        return view('/vehicleassignedlist', ['user' => $user, 'vehicle' => $vehicle, 'assigns' => $assigns, 'datas' => $datas]);
    }
    public function deleteId($id)
    {
        $assign = Assign::where('id', $id)->first();
        $user_id = $assign->vehicle_id;
        $user = User::where('vehicle_id', $user_id)->first();
        $user->vehicle_id = null;
        $user->vehicle_no = null;
        $user->save();
        $user_id = $assign->user_id;
        $vehicle = Vehicle::where('user_id', $user_id)->first();
        $vehicle->user_id = null;
        $vehicle->name = null;
        $vehicle->save();
        Assign::where('id', $id)->delete();
        session()->flash('message1', 'Deleted');
        return redirect('/vehicleassignedlist');
    }
    public function assignsearch(Request $request)
    {
        $role = 'user';
        $vehicle_id = null;
        $user = User::where('role', $role)->where('vehicle_id', $vehicle_id)->get();
        $user_id = null;
        $vehicle = Vehicle::where('user_id', $user_id)->get();
        $datas = Assign::get();
        if ($request->number_plate == "Select Number plate") {
            $assigns = Assign::paginate(10);
        } elseif ($request->number_plate != "Select Number plate") {
            $assigns = Assign::where('number_plate', $request->number_plate)->paginate(10);
        }
        return view('/vehicleassignedlist', ['user' => $user, 'vehicle' => $vehicle, 'assigns' => $assigns, 'datas' => $datas]);
    }
    public function assignsearchbar(Request $request)
    {
        $role = 'user';
        $vehicle_id = null;
        $user = User::where('role', $role)->where('vehicle_id', $vehicle_id)->get();
        $user_id = null;
        $vehicle = Vehicle::where('user_id', $user_id)->get();
        $datas = Assign::get();
        $query = $request['query'];
        $assigns = Assign::where('name', 'LIKE', "%$query%")
            ->orWhere('id', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->paginate(10);

        return view('/vehicleassignedlist', ['user' => $user, 'vehicle' => $vehicle, 'assigns' => $assigns, 'datas' => $datas]);
    }
}
