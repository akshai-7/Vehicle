<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Visual;
use App\Models\Cabin;
use App\Models\Vehiclecheck;
use App\Models\Assign;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt($request->only(['email','password'])))
        {
            $response['token']= Auth::user()->createToken('token')->plainTextToken;
            $user=Auth::user();
            $vehicle_id=$user->vehicle_id;
            $vehicle=Vehicle::where('id',$vehicle_id)->first();
            $assign=Assign::where('vehicle_id',$vehicle_id)->first();
            return response()->json( ["status"=>"true",$response,"user"=>[$user],"vehicle"=>[$vehicle],"assign"=>[$assign]],200);
        }else{
            return response()->json(['error'=>'Unauthorised'],401);
        }
    }

    public function visualcheck(Request $request,$id){
        $request->validate([
            'view'=>'required',
            'image'=>'required',
            'feedback'=>'required',
            'action'=>'required',
            // 'notes'=>'required',
        ]);

        $visual=Assign::where('id',$id)->first();
            if ($visual==null){
                return response()->json(['message'=>'Invalid Id'],401);
            }

            $data= $request->all();
        foreach($data['view'] as $row =>$value){
            $data1=array(
            'assign_id'=>$visual->id,
            'view'=>$data['view'][$row],
            'image'=> $data['image'][$row],
            'feedback'=>$data['feedback'][$row],
            // 'notes'=> $data['notes'][$row],
            'action'=> $data['action'][$row],
            );
            Visual::create($data1);
        }

        return response()->json(['message'=>'Data Stored Successfully','data'=> $data],200);
    }

}

