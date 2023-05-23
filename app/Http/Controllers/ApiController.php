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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\inspectionMail;

class ApiController extends Controller
{
    public function login(Request $request)
    {

        $email = User::where('email', $request->email)->first();
        if ($email == Null) {
            return response()->json(['error' => 'Invaild Email'], 401);
        }
        // if ($email->role != 'User') {
        //     return response()->json(['error' => ''], 401);
        // }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $response['token'] = Auth::user()->createToken('token')->plainTextToken;
            $user = Auth::user();
            $vehicle_id = $user->vehicle_id;
            $vehicle = Vehicle::where('id', $vehicle_id)->first();
            $assign = Assign::where('vehicle_id', $vehicle_id)->first();
            return response()->json(["status" => "true", $response, "user" => [$user], "vehicle" => [$vehicle], "assign" => [$assign]], 200);
        } else {
            return response()->json(['error' => 'Incorrect Password'], 401);
        }
    }
    public function inspection(Request $request, $id)
    {
        $request->validate([
            'reportno' => 'required',
            'mileage' => 'required',
        ]);
        $assign = Assign::where('id', $id)->first();
        if ($assign == null) {
            return response()->json(['message' => 'Invalid Id'], 401);
        }
        $inspection = new Inspection;
        $inspection->assign_id = $assign->id;
        $inspection->report_no = $request['reportno'];
        $inspection->name = $assign->name;
        $inspection->email =  $assign->email;
        $inspection->mobile = $assign->mobile;
        $inspection->date = date('Y-m-d');
        $inspection->next_inspection = Carbon::now()->addDays(7)->format('Y-m-d');
        $inspection->number_plate = $assign->number_plate;
        $inspection->mileage = $request['mileage'];
        $inspection->save();

        $id = $assign->id;
        $assign = Assign::where('id', $id)->first();
        $assign->mileage = $inspection->mileage;
        $assign->report_no = $inspection->report_no;
        $assign->last_inspection = $inspection->date;
        $assign->next_inspection = $inspection->next_inspection;
        $assign->save();
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

        ]);
        $name = $request->id;
        $assign = Assign::where('id', $id)->first();
        if ($assign == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $data = $request->all();
        $img = array();
        for ($i = 0; $i < count($data['image']); $i++) {
            $imageName = time() . '.' . $data['image'][$i]->getClientOriginalName();
            $data['image'][$i]->move(public_path('images'), $imageName);
            array_push($img, $imageName);
        }
        $data1 = array(
            'assign_id' => $assign->id,
            'image' =>  implode(",", $img),
            'date' => $request->date,
            'location' => $request->location,
            'witnessed_by' => $request->witnessed_by,
            'mobile' => $request->mobile,
            'statement' => $request->statement,
        );
        Report::create($data1);
        return response()->json(['message' => 'Data Stored Successfully', "data" => $data1], 200);
    }
    public function visualcheck(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'notes' => 'required',
            'status' => 'required',
            'feedback' => 'required'
        ]);

        $name = $request->name;
        $image = $request->file("image");
        $notes = $request->notes;
        $status = $request->status;
        $feedback = $request->feedback;
        $data = array();

        foreach (array_keys($name) as $row) {
            $img = array();

            if ($image != null) {
                for ($i = 0; $i < count($image); $i++) {

                    if (count($name) > count($image) && strtolower($request->type) === "visual") {
                        return response()->json(['message' => 'Image field Required'], 200);
                    }
                    $imageName = "";
                    if (array_keys($image[$i])[0] == $row) {
                        $imgname = $image[$i][$row]->getClientOriginalName();
                        $imageName = time() . $imgname;
                        $image[$i][$row]->move(public_path('images'), $imageName);
                        array_push($img, $imageName);
                    }
                }
            }
            $data1 = array(
                'type' => $request->type,
                'name' => $name[$row],
                'image' => count($img) > 0 ? $img : null,
                'status' => $status[$row],
                'notes' => $notes[$row],
                'feedback' => $feedback[$row],
            );
            array_push($data, $data1);

            $user = Inspection::where('id', $id)->first();
            if ($user == null) {
                return response()->json(['message' => 'Invalid Id'], 401);
            }

            $data2 = array(
                'inspection_id' => $user->id,
                'view' => $name[$row],
                'image' => implode(",", $img),
                'notes' => $notes[$row],
                'feedback' => $feedback[$row],
                'action' => $status[$row],
            );

            if (strtolower($request->type) === "visual") {
                $visual = Visual::where('inspection_id', $id)->where('view', $name[$row])->first();
                if ($visual != null) {
                    return response()->json(['message' => 'Duplicated Entry'], 401);
                };
                Visual::create($data2);
            }
            if (strtolower($request->type) === "vehicle") {
                $vehicle = Vehiclecheck::where('inspection_id', $id)->where('view', $name[$row])->first();
                if ($vehicle != null) {
                    return response()->json(['message' => 'Duplicated Entry'], 401);
                };
                Vehiclecheck::create($data2);
            }
            if (strtolower($request->type) === "cabin") {
                $cabin = Cabin::where('inspection_id', $id)->where('view', $name[$row])->first();
                if ($cabin != null) {
                    return response()->json(['message' => 'Duplicated Entry'], 401);
                };
                Cabin::create($data2);
            }
        };
        $visual = Visual::where('inspection_id', $id)->first();
        $vehicle = Vehiclecheck::where('inspection_id', $id)->first();
        $cabin = Cabin::where('inspection_id', $id)->first();
        if ($visual != null &&  $cabin != null && $vehicle != null) {
            $name = $user->name;
            Mail::To($user->email)->send(new inspectionMail($name));
        }

        return response()->json(['message' => 'Data Stored Successfully', "data" => $data], 200);
    }
    public function pdf($inspection_id)
    {
        $visual = Visual::where('inspection_id', $inspection_id)->get();
        $vehicle = Vehiclecheck::where('inspection_id', $inspection_id)->get();
        $cabin = Cabin::where('inspection_id', $inspection_id)->get();
        $pdf = Pdf::loadView('M&d-foundations', ['cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle]);
        return $pdf->download('M&d-foundations.pdf');
    }
}
