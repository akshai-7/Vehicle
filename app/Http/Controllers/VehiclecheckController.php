<?php

namespace App\Http\Controllers;

use App\Models\Vehiclecheck;
use Illuminate\Http\Request;
use App\Models\Inspection;

class VehiclecheckController extends Controller
{

    public function vehicleimages($id)
    {

        $vehicle = Vehiclecheck::where('id', $id)->first();
        return view('/vehicleimages', ['vehicle' => $vehicle]);
    }
    public function updatevehiclecheck($id)
    {
        $vehicle = Vehiclecheck::where('id', $id)->get();
        return view('/updatevehiclecheck', ['vehicle' => $vehicle]);
    }
    public function vehicleupdate(Request $request, $id)
    {

        $request->validate([
            'view' => 'required',
            'image' => 'required',
            'feedback' => 'required',
            'action' => 'required',
        ]);
        $id = $request->inspection_id;
        $data1 = Inspection::find($id);
        if ($data1 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }

        $data2 = $request->id;

        $data3 = Vehiclecheck::find($data2);
        if ($data3 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $vehicle = Vehiclecheck::where('inspection_id', $data1->id)->where('id', $data3->id)->first();
        $vehicle->view = $request['view'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $path = public_path('images');
            $imagepath = $request->image->move($path, $name);
            $vehicle->image = $name;
        }
        $vehicle->feedback = $request['feedback'];
        $vehicle->action = $request['action'];
        $vehicle->save();
        session()->flash('message', ' Updated Successfully');
        return redirect('/details/' . $data1->id);
    }
    public function deletevehicle($id)
    {
        $user = Vehiclecheck::find($id);
        $user->delete();
        $data = $user->inspection_id;
        session()->flash('message1', 'Deleted');
        return redirect('/details/' . $data);
    }
}
