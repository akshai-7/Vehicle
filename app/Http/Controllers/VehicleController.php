<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
Use App\Models\Vehicle;
use App\Models\Assign;
class VehicleController extends Controller
{
    public function admin(Request $request){
        $user = User::where(['email'=>$request->email])->first();
        if(!$user|| !Hash::check($request->password,$user->password)){
            return   "<script>alert('Email-id or Password is not matched');window.location.href='".('/')."'; </script>";
        }
        if($user->role!= 'admin'){
            return "<script>alert('You Are Not Admin');window.location.href='".('/')."'; </script>";
        }
            return redirect('/user');
    }
    //driver
    public function createuser(Request $request){
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'password'=>'required|',
            'mobile'=>'required',
        ]);
        $user = new User();
        $user->name=$request['name'];
        $user->gender=$request['gender'];
        $user->date_of_birth=$request['date_of_birth'];
        $user->address=$request['address'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        $user->mobile=$request['mobile'];
        $user->save();
        session()->flash('message','Driver is Created');
        return redirect('/user');
    }
    public function userlist(){
        $role='user';
        $user=User::where('role',$role)->get();
        $role1='admin';
        $user1=User::where('role',$role1)->first();
        return view('/user',['user'=>$user],['user1'=>$user1]);
    }
    public function updateuserdetails(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
         ]);
         $id= $request->id;
             $data1=User::find($id);
             if ($data1==null){
                 return response()->json(['message'=>'Invalid Id']);
             }
         $user= User::where('id',$id)->first();
         $user->name=$request['name'];
         $user->gender=$request['gender'];
         $user->date_of_birth=$request['date_of_birth'];
         $user->address=$request['address'];
         $user->email=$request['email'];
         $user->password=Hash::make($request['password']);
         $user->mobile=$request['mobile'];
         $user->save();
         session()->flash('message',' Updated Successfully');
         return redirect('/user');
     }
     public function delete($id){
        User::find($id)->delete();
        session()->flash('message1',' User is Deleted');
        return redirect('/user');
    }

//vehicle
     public function createvehicle(Request $request){
        $request->validate([
           'number_plate'=>'required',
           'vehicle_name'=>'required',
           'vehicle_type'=>'required',
           'mileage'=>'required',
        ]);
        $vehicle=new Vehicle();
        $vehicle->number_plate=$request['number_plate'];
        $vehicle->vehicle_name=$request['vehicle_name'];
        $vehicle->vehicle_type=$request['vehicle_type'];
        $vehicle->mileage=$request['mileage'];
        $vehicle->save();
        session()->flash('message','Vehicle is Created');
        return redirect('/user');
    }
    public function vehiclelist(){
        $vehicle=Vehicle::all();
        return view('vehiclelist',compact('vehicle'));
    }
    public function updatevehicle(Request $request,$id){
        $request->validate([
            'number_plate'=>'required',
            'vehicle_name'=>'required',
            'vehicle_type'=>'required',
            'mileage'=>'required',
         ]);
         $id= $request->id;
             $vehicle1=Vehicle::find($id);
             if ($vehicle1==null){
                 return response()->json(['message'=>'Invalid Id']);
             }
         $vehicle=Vehicle::where('id',$id)->first();
         $vehicle->number_plate=$request['number_plate'];
         $vehicle->vehicle_name=$request['vehicle_name'];
         $vehicle->vehicle_type=$request['vehicle_type'];
         $vehicle->mileage=$request['mileage'];
         $vehicle->save();
         session()->flash('message','Updated Successfully');
         return redirect('/vehiclelist');
    }
    public function remove($id){
        Vehicle::find($id)->delete();
        session()->flash('message1',' Vehicle is Deleted');
        return redirect('/vehiclelist');
    }

    //assign
    public function vehicleassign(){
        $role='user';
        $user=User::where('role',$role)->get();
        $vehicle=Vehicle::all();
        return view('/vehicleassign',compact('vehicle'),compact('user'));
    }
    public function vehicleassignlist(Request $request){
        $number_plate=$request['number_plate'];
        $name=$request['name'];
        $user=User::where('name',$name)->first();
        $vehicle=Vehicle::where('number_plate',$number_plate)->first();

        $assign=new Assign();
        $assign->driver_id=$user->id;
        $assign->name=$user->name;
        $assign->email=$user->email;
        $assign->mobile=$user->mobile;
        $assign->vehicle_id=$vehicle->id;
        $assign->number_plate=$vehicle->number_plate;
        $assign->mileage=$vehicle->mileage;
        $assign->save();

        // $assign=Assign::all();
        // return view('/vehicleassignedlist',compact('assign'));
    }
    public function vehicleassignedlist(){
        $assign=Assign::all();
        return view('/vehicleassignedlist',compact('assign'));
    }
}
