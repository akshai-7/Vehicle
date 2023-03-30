<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\Visual;
use App\Models\Vehiclecheck;
use App\Models\Cabin;
use App\Models\Assign;
use Illuminate\Support\Carbon;

class InspectionController extends Controller
{
    public function weeklyinspection($id)
    {
        $assign = Assign::where('id', $id)->first();
        return view('/inspection', compact('assign'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'view' => 'required',
            'feedback' => 'required',
            'action' => 'required',
            'notes' => 'required',
            'view1' => 'required',
            'feedback1' => 'required',
            'action1' => 'required',
            'notes1' => 'required',
            'view2' => 'required',
            'feedback2' => 'required',
            'action2' => 'required',
            'notes2' => 'required',
        ]);

        $name = $request->name;
        $assign = Assign::where('name', $name)->first();
        $inspection = new Inspection;
        $inspection->assign_id = $assign->id;
        $inspection->report_no = $assign->number_plate . date('Y-m-d');
        $inspection->inspected_by = $request['inspected_by'];
        $inspection->name = $assign->name;
        $inspection->email = $assign->email;
        $inspection->mobile = $assign->mobile;
        $inspection->date = date('Y-m-d');
        $inspection->next_inspection = Carbon::parse($request->date)->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
        $inspection->number_plate = $assign->number_plate;
        $inspection->mileage = $request['mileage'];
        $inspection->save();

        $id = $assign->id;
        $assign = Assign::where('id', $id)->first();
        $assign->mileage = $inspection->mileage;
        $assign->last_inspection = $inspection->date;
        $assign->next_inspection = $inspection->next_inspection;
        $assign->save();

        $assign_id = $assign->id;
        $assign_id = Inspection::where('assign_id', $assign_id)->latest('id')->first();
        // $data = $request->all();
        // foreach ($data['view'] as $row => $value) {
        //     $img = array();
        //     for ($i = 0; $i < count($data[$data['view'][$row]]); $i++) {
        //         $imageName = time() . '.' . $data[$data['view'][$row]][$i]->getClientOriginalName();
        //         $data[$data['view'][$row]][$i]->move(public_path('images'), $imageName);
        //         array_push($img, $imageName);
        //     }
        //     $data1 = array(
        //         'inspection_id' => $assign_id->id,
        //         'view' => $data['view'][$row],
        //         'image' =>  implode(",", $img),
        //         'feedback' => $data['feedback'][$row],
        //         'notes' => $data['notes'][$row],
        //         'action' => $data['action'][$row],
        //     );

        //     Visual::create($data1);
        // }

        $data2 = $request->all();
        foreach ($data2['view1'] as $key => $value) {
            $img1 = array();
            // dd($data2);
            for ($i = 0; $i < count($data2[$data2['view1'][$key]]); $i++) {
                $imageName = time() . '.' . $data2[$data2['view1'][$key]][$i]->getClientOriginalName();
                $data2[$data2['view1'][$key]][$i]->move(public_path('images'), $imageName);
                array_push($img1, $imageName);
            }

            $data3 = array(
                'inspection_id' => $assign_id->id,
                'view' => $data2['view1'][$key],
                'image' => implode(",", $img1),
                'feedback' => $data2['feedback1'][$key],
                'notes' => $data2['notes1'][$key],
                'action' => $data2['action1'][$key],
            );
            Vehiclecheck::create($data3);
        }
        // $data4 = $request->all();
        // foreach ($data4['view2'] as $list => $value) {
        //     $img2 = array();
        //     for ($i = 0; $i < count($data4[$data4['view2'][$list]]); $i++) {
        //         $imageName = time() . '.' . $data4[$data4['view2'][$list]][$i]->getClientOriginalName();
        //         $data4[$data4['view2'][$list]][$i]->move(public_path('images'), $imageName);
        //         array_push($img2, $imageName);
        //     }
        //     $data5 = array(
        //         'inspection_id' => $assign_id->id,
        //         'view' => $data4['view2'][$list],
        //         'image' => implode(",", $img2),
        //         'feedback' => $data4['feedback2'][$list],
        //         'notes' => $data4['notes2'][$list],
        //         'action' => $data4['action2'][$list],
        //     );
        //     Cabin::create($data5);
        // }
        return redirect('/inspectiondetails');
    }

    public function inspection()
    {
        $inspections = Inspection::all();
        $assigns = Assign::all();
        // $inspections = Inspection::paginate(1);
        // $assigns = Assign::paginate(1);
        return view('/inspectiondetails', compact('inspections', 'assigns'));
    }
    public function deleteinspection($id)
    {
        Inspection::find($id)->delete();
        Visual::where('inspection_id', $id)->delete();
        Vehiclecheck::where('inspection_id', $id)->delete();
        Cabin::where('inspection_id', $id)->delete();
        session()->flash('message1', ' Inspection detail is Deleted');
        return redirect('/inspectiondetails');
    }
    public function search(Request $request)
    {
        if ($request->name == "Select" && $request->date == null) {
            $inspections = Inspection::get();
            $assigns = Assign::all();
            return view('/inspectiondetails', compact('inspections', 'assigns'));
        } elseif ($request->name == "Select" && $request->date != null) {
            $inspections = Inspection::where('created_at', $request->date)->get();
            $assigns = Assign::all();
            return view('/inspectiondetails', compact('inspections', 'assigns'));
        } elseif ($request->name != "Select" && $request->date == null) {
            $inspections = Inspection::where('name', $request->name)->get();
            $assigns = Assign::all();
            return view('/inspectiondetails', compact('inspections', 'assigns'));
        } else {
            $inspections = Inspection::where('created_at', $request->date)->where('name', $request->name)->get();
            $assigns = Assign::all();
            return view('/inspectiondetails', compact('inspections', 'assigns'));
        }
    }
}
