<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Cabin;
use App\Models\User;
use App\Models\Report;
use App\Models\Inspection;
use App\Models\Vehicle;
use App\Models\Vehiclecheck;
use App\Models\Visual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function inspection(Request $request, $id)
    {
        $request->validate([
            'reportno' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'number_plate' => 'required',
            'mileage' => 'required',
        ]);
        $assign = Assign::where('id', $id)->first();
        if ($assign == null) {
            return response()->json(['message' => 'Invalid Id'], 401);
        }
        $inspection = new Inspection;
        $inspection->assign_id = $assign->id;
        $inspection->report_no = $request['reportno'];
        $inspection->name = $request['name'];
        $inspection->email = $request['email'];
        $inspection->mobile = $request['mobile'];
        $inspection->date = date('d.m.y');
        $inspection->next_inspection = Carbon::now()->endOfWeek(Carbon::FRIDAY)->format('d.m.Y');
        $inspection->number_plate = $request['number_plate'];
        $inspection->mileage = $request['mileage'];
        $inspection->save();
        return response()->json(['message' => 'Data Stored Successfully', "data" => $inspection], 200);
    }

    public function report(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'location' => 'required',
            'witnessed_by' => 'required',
            'mobile' => 'required',
            'statement' => 'required',
            'image' => 'required',
        ]);

        $assign = Assign::where('id', $id)->first();
        if ($assign == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $report = new  Report();
        $report->assign_id = $assign->id;
        $report->date = $request['date'];
        $report->location = $request['location'];
        $report->witnessed_by = $request['witnessed_by'];
        $report->mobile = $request['mobile'];
        $report->statement = $request['statement'];
        $report->image = $request['image'];
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $location = public_path($name);
            $report->image = $name;
        }
        $report->save();
        return response()->json(['message' => 'Data Stored Successfully', "data" => $report], 200);
    }
    public function visualcheck(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'image' => 'required',
            'name' => 'required',
            'notes' => 'required',
            'status' => 'required',
        ]);

        $name = $request->name;
        $image = $request->file("image");
        $notes = $request->notes;
        $status = $request->status;
        $data = array();
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
            array_push($data, $data1);

            $visual = Inspection::where('id', $id)->first();
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

        return response()->json(['message' => 'Data Stored Successfully', "data" => $data], 200);
    }
}
