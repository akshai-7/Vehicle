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
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
public function login(Request $request){
    if(Auth::attempt($request->only(['email','password'])))
    {
        $response['token']= Auth::user()->createToken('token')->plainTextToken;
        $user=Auth::user();
        $vehicle_id=$user->vehicle_id;
        $vehicle=Vehicle::where('id',$vehicle_id)->first();
        // dd($vehicle);
        return response()->json( ["status"=>"true",$response,"user"=>[$user],"vehicle"=>[$vehicle]],200);
    }else{
        return response()->json(['error'=>'Unauthorised'],401);
    }
}
}
