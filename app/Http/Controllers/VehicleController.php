<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Cabin;
use App\Models\Inspection;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Vehiclecheck;
use App\Models\Visual;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class VehicleController extends Controller
{
    public function admin(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return "<script>alert('Email-id or Password is not matched');window.location.href='" . ('/') . "'; </script>";
        }
        if ($user->role != 'admin') {
            return "<script>alert('You Are Not Admin');window.location.href='" . ('/') . "'; </script>";
        }
        return redirect('/user');
    }
    //driver
    public function createuser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'password' => 'required|',
            'mobile' => 'required',
        ]);
        $user = new User();
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->address = $request['address'];
        $user->company = $request['company'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->mobile = $request['mobile'];
        $user->save();
        session()->flash('message', 'Driver is Created');
        return redirect('/user');
    }
    public function userlist()
    {
        $role = 'user';
        // $users=User::where('role',$role)->paginate(2);
        $users = User::where('role', $role)->get();
        $role1 = 'admin';
        $user1 = User::where('role', $role1)->first();
        return view('/user', ['users' => $users], ['user1' => $user1]);
    }
    public function updateuser($id)
    {
        $user = User::where('id', $id)->get();
        $role = 'user';
        $user1 = User::where('role', $role)->get();
        return view('/updateuser', ['user' => $user], ['user1' => $user1]);
    }
    public function updateuserdetails(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);
        $id = $request->id;
        $data1 = User::find($id);
        if ($data1 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $user = User::where('id', $id)->first();
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->address = $request['address'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->mobile = $request['mobile'];
        $user->save();
        session()->flash('message', ' Updated Successfully');
        return redirect('/user');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message1', ' User is Deleted');
        return redirect('/user');
    }

    //vehicle
    public function createvehicle(Request $request)
    {
        $request->validate([
            'number_plate' => 'required',
            'vehicle_name' => 'required',
            'vehicle_type' => 'required',
            'mileage' => 'required',
        ]);
        $vehicle = new Vehicle();
        $vehicle->number_plate = $request['number_plate'];
        $vehicle->vehicle_name = $request['vehicle_name'];
        $vehicle->vehicle_type = $request['vehicle_type'];
        $vehicle->mileage = $request['mileage'];
        $vehicle->save();
        session()->flash('message', 'Vehicle is Created');
        return redirect('/user');
    }
    public function vehiclelist()
    {
        $vehicle = Vehicle::all();
        return view('vehiclelist', compact('vehicle'));
    }
    public function updatevehicle(Request $request, $id)
    {
        $request->validate([
            'number_plate' => 'required',
            'vehicle_name' => 'required',
            'vehicle_type' => 'required',
            'mileage' => 'required',
        ]);
        $id = $request->id;
        $vehicle1 = Vehicle::find($id);
        if ($vehicle1 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $vehicle = Vehicle::where('id', $id)->first();
        $vehicle->number_plate = $request['number_plate'];
        $vehicle->vehicle_name = $request['vehicle_name'];
        $vehicle->vehicle_type = $request['vehicle_type'];
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

    //assign
    public function vehicleassign()
    {
        $role = 'user';
        $vehicle_id = null;
        $user = User::where('role', $role)->where('vehicle_id', $vehicle_id)->get();
        $assigned_id = null;
        $vehicle = Vehicle::where('assigned_id', $assigned_id)->get();
        return view('/vehicleassign', compact('vehicle'), compact('user'));
    }
    public function vehicleassignlist(Request $request)
    {
        $number_plate = $request['number_plate'];
        $name = $request['name'];
        $user = User::where('name', $name)->first();
        $vehicle = Vehicle::where('number_plate', $number_plate)->first();
        $assign = new Assign();
        $assign->driver_id = $user->id;
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
        $vehicle->assigned_id = $user->id;
        $vehicle->name = $user->name;
        $vehicle->save();
        return redirect('/vehicleassignedlist');
    }
    public function vehicleassignedlist()
    {
        $assign = Assign::all();
        return view('/vehicleassignedlist', compact('assign'));
    }
    public function deleteId($id)
    {
        $assign = Assign::where('id', $id)->first();
        $user_id = $assign->vehicle_id;
        $user = User::where('vehicle_id', $user_id)->first();
        $user->vehicle_id = null;
        $user->vehicle_no = null;
        $user->save();
        $assigned_id = $assign->driver_id;
        $vehicle = Vehicle::where('assigned_id', $assigned_id)->first();
        $vehicle->assigned_id = null;
        $vehicle->name = null;
        $vehicle->save();
        Assign::where('id', $id)->delete();
        session()->flash('message1', 'Deleted');
        return redirect('/vehicleassignedlist');
    }

    //inspections
    public function weeklyinspection($id)
    {
        $assign = Assign::where('id', $id)->first();
        return view('/inspection', compact('assign'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'view' => 'required',
            'image' => 'required',
            'feedback' => 'required',
            'action' => 'required',
            'notes' => 'required',
            'view1' => 'required',
            'image1' => 'required',
            'feedback1' => 'required',
            'action1' => 'required',
            'notes1' => 'required',
            'view2' => 'required',
            'image2' => 'required',
            'feedback2' => 'required',
            'action2' => 'required',
            'notes2' => 'required',
        ]);

        $id = $request->id;
        $assign = Assign::where('id', $id)->first();

        $inspection = new Inspection;
        $inspection->assign_id = $assign->id;
        $inspection->report_no = $request['reportno'];
        $inspection->name = $request['name'];
        $inspection->email = $request['email'];
        $inspection->mobile = $request['mobile'];
        $inspection->date = $request['date'];
        $inspection->next_inspection = Carbon::now()->endOfWeek(Carbon::FRIDAY)->format('d.m.Y');
        $inspection->number_plate = $request['number_plate'];
        $inspection->mileage = $request['mileage'];
        $inspection->save();

        $assign_id = $assign->id;
        $assign_id = Inspection::where('assign_id', $assign_id)->first();
        $data = $request->all();
        foreach ($data['view'] as $row => $value) {
            $data1 = array(
                'assign_id' => $assign_id->id,
                'view' => $data['view'][$row],
                'image' => $data['image'][$row],
                'feedback' => $data['feedback'][$row],
                'notes' => $data['notes'][$row],
                'action' => $data['action'][$row],
            );
            Visual::create($data1);
        }
        $data2 = $request->all();
        foreach ($data2['view'] as $key => $value) {
            $data3 = array(
                'assign_id' => $assign_id->id,
                'view' => $data2['view1'][$key],
                'image' => $data2['image1'][$key],
                'feedback' => $data2['feedback1'][$key],
                // 'notes'=> $data2['notes1'][$key],
                'action' => $data2['action1'][$key],
            );
            Vehiclecheck::create($data3);
        }
        $data4 = $request->all();
        foreach ($data4['view'] as $list => $value) {
            $data5 = array(
                'assign_id' => $assign_id->id,
                'view' => $data4['view2'][$list],
                'image' => $data4['image2'][$list],
                'feedback' => $data4['feedback2'][$list],
                // 'notes'=> $data4['notes2'][$list],
                'action' => $data4['action2'][$list],
            );
            Cabin::create($data5);
        }
        return redirect('/inspectiondetails');
    }

    public function inspection()
    {
        $inspection = Inspection::all();
        return view('/inspectiondetails', compact('inspection'));
    }

    public function check($assign_id)
    {
        $visual = Visual::where('assign_id', $assign_id)->get();
        // dd($visual);
        $vehicle = Vehiclecheck::where('assign_id', $assign_id)->get();
        $cabin = Cabin::where('assign_id', $assign_id)->get();
        return view('/details', ['cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle]);
    }

    public function summary($assign_id)
    {
        $visual = Visual::where('assign_id', $assign_id)->get();
        $vehicle = Vehiclecheck::where('assign_id', $assign_id)->get();
        $cabin = Cabin::where('assign_id', $assign_id)->get();
        return view('/summary', ['cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle]);
    }

    public function pdf($assign_id)
    {
        $visual = Visual::where('assign_id', $assign_id)->get();
        $vehicle = Vehiclecheck::where('assign_id', $assign_id)->get();
        $cabin = Cabin::where('assign_id', $assign_id)->get();
        $pdf = Pdf::loadView('userpdf', ['cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle]);
        return $pdf->download('userpdf.pdf');
    }
    public function edit($assign_id)
    {
        return redirect('/details/' . $assign_id);
    }
}
