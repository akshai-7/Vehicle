<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class UserController extends Controller
{
    public function createuser(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required',

        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->address = $request['address'];
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
        session()->flash('message', 'Driver is Created');
        return redirect('/user');
    }


    public function userlist()
    {
        $role = 'User';
        $users = User::where('role', $role)->get();
        return view('/user', ['users' => $users]);
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
            'company' => 'required',
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
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->mobile = $request['mobile'];
        $user->save();
        session()->flash('message', ' Updated Successfully');
        return redirect('/user');
    }
    public function licenseimage($id)
    {
        $user = User::where('id', $id)->first();
        return view('/licenseimage', ['user' => $user]);
    }
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message1', ' User is Deleted');
        return redirect('/user');
    }

    public function users(Request $request)
    {

        if ($request->name == "Select" && $request->date == null) {
            $role = 'User';
            $users = User::where('role', $role)->paginate(10);
            return view('/user', ['users' => $users]);
        } elseif ($request->name == "Select" && $request->date != null) {
            $role = 'User';
            $users = User::where('role', $role)->where('created_at', $request->date)->paginate(10);
            return view('/user', ['users' => $users]);
        } elseif ($request->name != "Select" && $request->date == null) {
            $role = 'User';
            $users = User::where('role', $role)->where('name', $request->name)->paginate(10);
            return view('/user', ['users' => $users]);
        } else {
            $role = 'User';
            $users = User::where('role', $role)->where('created_at', $request->date)->where('name', $request->name)->paginate(10);
            return view('/user', ['users' => $users]);
        }
    }
}
