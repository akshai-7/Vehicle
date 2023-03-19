<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Cabin;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Vehiclecheck;
use App\Models\Visual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $response['token'] = Auth::user()->createToken('token')->plainTextToken;
            $user = Auth::user();
            $vehicle_id = $user->vehicle_id;
            $vehicle = Vehicle::where('id', $vehicle_id)->first();
            $assign = Assign::where('vehicle_id', $vehicle_id)->first();
            return response()->json(["status" => "true", $response, "user" => [$user], "vehicle" => [$vehicle], "assign" => [$assign]], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function visualcheck(Request $request, $id)
    {
        //     $request->validate([
        //         'type'=>'required',
        //        'image'=>'required',
        //        'name'=>'required',
        //        'notes'=>'required',
        //        'status'=>'required',

        // ]);

        // dd($request->name);

        $name = $request->name;
        $image = $request->file("image");
        $notes = $request->notes;
        $status = $request->status;

        $a = array();
        // dd($image);

        foreach (array_keys($name) as $row) {
            $img = array();

            if ($image == null) {
                return response()->json(['message' => 'Image field Required'], 200);

            }

            for ($i = 0; $i < count($image); $i++) {

                if (count($name) > count($image)) {
                    return response()->json(['message' => 'Image field Required'], 200);
                }

                if (array_keys($image[$i])[0] == $row) {
                    $imgname = $image[$i][$row]->getClientOriginalName();
                    // $location=public_path($imgname);
                    $imageName = time() . '.' . $image[$i][$row]->extension();
                    $image[$i][$row]->move(public_path('images'), $imageName);
                    array_push($img, $imageName);

                }

            }

            $data1 = array(
                'type' => $request->type,
                'name' => $name[$row],
                'image' => $img,
                'status' => $status[$row],
                'notes' => $notes[$row],
            );
            array_push($a, $data1);

            $visual = Assign::where('id', $id)->first();
            if ($visual == null) {
                return response()->json(['message' => 'Invalid Id'], 401);
            }

            $data2 = array(
                'assign_id' => $visual->id,
                'view' => $name[$row],
                'image' => implode(",", $img),
                'feedback' => $notes[$row],
                // 'notes'=> $data['notes'][$row],
                'action' => $status[$row],
            );

            if (strtolower($request->type) === "visual") {
                $visual = Visual::where('assign_id', $id)->where('view', $name[$row])->first();
                if ($visual != null) {
                    return response()->json(['message' => 'Duplicated Entry'], 401);
                };
                Visual::create($data2);

            }
            if (strtolower($request->type) === "cabin") {
                $visual = Cabin::where('assign_id', $id)->where('view', $name[$row])->first();
                if ($visual != null) {
                    return response()->json(['message' => 'Duplicated Entry'], 401);
                };
                Cabin::create($data2);

            }
            if (strtolower($request->type) === "vehicle") {
                $visual = Vehiclecheck::where('assign_id', $id)->where('view', $name[$row])->first();
                if ($visual != null) {
                    return response()->json(['message' => 'Duplicated Entry'], 401);
                };
                Vehiclecheck::create($data2);

            }

        };

        return response()->json(['message' => 'Data Stored Successfully', "data" => $a], 200);
    }

}
