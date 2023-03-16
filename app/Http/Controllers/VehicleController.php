<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
Use App\Models\Vehicle;
use App\Models\Assign;
use App\Models\Visual;
use App\Models\Vehiclecheck;
use App\Models\Cabin;
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
        return redirect('/vehicleassignedlist');
    }
    public function vehicleassignedlist(){
        $assign=Assign::all();
        return view('/vehicleassignedlist',compact('assign'));
    }
    public function deleteId($id){
        Assign::find($id)->delete();
        session()->flash('message1',' Vehicle is Deleted');
        return redirect('/vehicleassignedlist');
    }
    public function weeklyinspection($id){
        return view('/inspection',compact('id'));
    }
    public function store(Request $request){
        $request->validate([
            'view'=>'required',
            'image'=>'required',
            'feedback'=>'required',
            'action'=>'required',
            'notes'=>'required',
            'view1'=>'required',
            'image1'=>'required',
            'feedback1'=>'required',
            'action1'=>'required',
            'notes1'=>'required',
            'view2'=>'required',
            'image2'=>'required',
            'feedback2'=>'required',
            'action2'=>'required',
            'notes2'=>'required',
        ]);
        $id=$request->id;
        $assign=Assign::where('id',$id)->latest('id')->first();
        $assign_id=$assign->id;
        $data= $request->all();
        // dd($data);
        foreach($data['view'] as $row =>$value){
            $data1=array(
            'assign_id'=>$assign_id,
            'view'=>$data['view'][$row],
            'image'=> $data['image'][$row],
            'feedback'=>$data['feedback'][$row],
            'notes'=> $data['notes'][$row],
            'action'=> $data['action'][$row],
            );
            Visual::create($data1);
        }
        $data2= $request->all();
        // dd($data2);
        foreach($data2['view'] as $key =>$value){
            $data3=array(
            'assign_id'=>$assign_id,
            'view'=>$data2['view1'][$key],
            'image'=> $data2['image1'][$key],
            'feedback'=>$data2['feedback1'][$key],
            // 'notes'=> $data2['notes1'][$key],
            'action'=> $data2['action1'][$key],
            );
            Vehiclecheck::create($data3);
        }
        $data4= $request->all();
        foreach($data4['view'] as $list =>$value){
            $data5=array(
            'assign_id'=>$assign_id,
            'view'=>$data4['view2'][$list],
            'image'=> $data4['image2'][$list],
            'feedback'=>$data4['feedback2'][$list],
            // 'notes'=> $data4['notes2'][$list],
            'action'=> $data4['action2'][$list],
            );
            Cabin::create($data5);
        }
        return redirect('/vehicleassignedlist');
    }
}
