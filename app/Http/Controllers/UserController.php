<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Assign;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function createuser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'license' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required',
        ]);
        $user = new User();
        $user->name = $request['name'];
        $user->role = $request['role'];
        $user->gender = $request['gender'];
        $date = $request['date_of_birth'];
        $formatted_date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $user->date_of_birth = $formatted_date;
        $user->address = $request['address'];
        $user->city = $request['city'];
        $user->postcode = $request['postcode'];
        $user->country = $request['country'];
        $user->company = $request['company'];

        $data = $request->all();
        $img = array();
        for ($i = 0; $i < count($data['license']); $i++) {
            $imageName = time() . '.' . $data['license'][$i]->getClientOriginalName();
            $data['license'][$i]->move(public_path('images'), $imageName);
            array_push($img, $imageName);
        }
        $data4 = array(
            'license' =>  implode(",", $img),
        );
        $user->license = $data4['license'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->mobile = $request['mobile'];
        $user->save();
        if ($request->role == 'User') {
            session()->flash('message', 'Driver is Created');
            return redirect('/user');
        } else {
            session()->flash('message', 'Admin is Created');
            return redirect('/admin');
        }
    }
    public function userlist()
    {
        $role = 'User';
        $users = User::where('role', $role)->paginate(10);
        $datas = User::where('role', $role)->get();
        return  view('/user', ['users' => $users], ['datas' => $datas]);
    }

    public function admin()
    {
        $role = 'admin';
        $users = User::where('role', $role)->paginate(10);
        $datas = User::where('role', $role)->get();
        return  view('/admin', ['users' => $users], ['datas' => $datas]);
    }
    public function updateuserdetails(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'company' => 'required',
            'address' => 'required',
            'city' => 'required',
            'role' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'company' => 'required',
            'address' => 'required',
            'city' => 'required',
            'role' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $id = $request->id;
        $data1 = User::find($id);
        if ($data1 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $user = User::where('id', $id)->first();
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->role = $request['role'];
        $date = $request['date_of_birth'];
        $formatted_date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        $user->date_of_birth = $formatted_date;
        $user->company = $request['company'];
        $data = $request->all();
        $img = array();
        if (isset($data['license'])) {
            for ($i = 0; $i < count($data['license']); $i++) {
                $imageName = time() . '.' . $data['license'][$i]->getClientOriginalName();
                $data['license'][$i]->move(public_path('images'), $imageName);
                array_push($img, $imageName);
            }
            $data4 = array(
                'license' =>  implode(",", $img),
            );
        } else {
            $data4 = array(
                'license' =>  null,
            );
        }
        $user->license = $data4['license'];
        $user->address = $request['address'];
        $user->city = $request['city'];
        $user->postcode = $request['postcode'];
        $user->country = $request['country'];
        $user->email = $request['email'];
        $user->mobile = $request['mobile'];
        $user->save();
        if ($request->role == 'User') {
            session()->flash('message', ' Updated Successfully');
            return redirect('/user');
        } else {
            session()->flash('message', ' Updated Successfully');
            return redirect('/admin');
        }
    }
    public function delete($id)
    {
        $id = User::where('id', $id)->first();
        $user_id = $id->id;
        $assign = Assign::where('user_id', $user_id)->first();
        if ($assign == null) {
            $id->delete();
        } else {
            Assign::where('user_id', $user_id)->delete();
            $vehicle = Vehicle::where('user_id', $user_id)->first();
            $vehicle->user_id = null;
            $vehicle->name = null;
            $vehicle->save();
            $id->delete();
        }
        if ($id->role == 'User') {
            session()->flash('message1', ' Driver Deleted');
            return redirect('/user');
        } else {
            session()->flash('message1', '  Admin Deleted');
            return redirect('/admin');
        }
    }

    public function users(Request $request)

    {
        $role = 'User';
        $datas = User::where('role', $role)->get();
        if ($request->name == "Select Name" && $request->date == 'Select Date') {
            $users = User::where('role', $role)->paginate(10);
        } elseif ($request->name == "Select Name" && Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d') != 'Select Date') {
            $users = User::where('role', $role)->where('created_at', Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'))->paginate(10);
        } elseif ($request->name != "Select Name" && $request->date == 'Select Date') {
            $users = User::where('role', $role)->where('name', $request->name)->paginate(10);
        } else {
            $users = User::where('role', $role)->where('created_at', Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'))->where('name', $request->name)->paginate(10);
        }
        return view('/user', ['users' => $users], ['datas' => $datas]);
    }
    public function adminsearch(Request $request)
    {
        $role = 'admin';
        $datas = User::where('role', $role)->get();
        if ($request->name == "Select Name" && $request->date == 'Select Date') {
            $users = User::where('role', $role)->paginate(10);
        } elseif ($request->name == "Select Name" && Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d') != 'Select Date') {
            $users = User::where('role', $role)->where('created_at', Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'))->paginate(10);
        } elseif ($request->name != "Select Name" && $request->date == 'Select Date') {
            $users = User::where('role', $role)->where('name', $request->name)->paginate(10);
        } else {
            $users = User::where('role', $role)->where('created_at', Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'))->where('name', $request->name)->paginate(10);
        }
        return view('/admin', ['users' => $users], ['datas' => $datas]);
    }
    public function driversearchbar(Request $request)
    {
        $role = 'User';
        $datas = User::where('role', $role)->get();
        $query = $request['query'];
        if ($request['query'] == null) {
            $users = User::where('role', $role)->paginate(10);
        } elseif ($request['query'] != null) {
            $users = User::where('name', 'LIKE', "%$query%")
                ->orWhere('email', 'LIKE', "%$query%")
                ->paginate(10);
        }
        return view('/user', compact('users', 'datas'));
    }
    public function adminsearchbar(Request $request)
    {
        $role = 'admin';
        $datas = User::where('role', $role)->get();
        $query = $request['query'];
        if ($request['query'] == null) {
            $users = User::where('role', $role)->paginate(10);
        } elseif ($request['query'] != null) {
            $users = User::where('name', 'LIKE', "%$query%")
                ->orWhere('email', 'LIKE', "%$query%")
                ->paginate(10);
        }
        return view('/admin', compact('users', 'datas'));
    }
}
