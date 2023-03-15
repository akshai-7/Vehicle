<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        session()->flash('message','User is Created');
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
}
