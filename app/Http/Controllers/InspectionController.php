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
        $request->validate([
            'view' => 'required',
            'image' => 'required',
            'feedback' => 'required',
            'action' => 'required',
            'notes' => 'required',
            'view1' => 'required',
            'image1' => 'required',
            'feedback1' => 'required',
            'action1' => 'required',
            'notes1' => 'required',
            'view2' => 'required',
            'image2' => 'required',
            'feedback2' => 'required',
            'action2' => 'required',
            'notes2' => 'required',
        ]);

        $id = $request->id;
        $assign = Assign::where('id', $id)->first();
        $inspection = new Inspection;
        $inspection->assign_id = $assign->id;
        $inspection->report_no = $request['reportno'];
        $inspection->name = $request['name'];
        $inspection->email = $request['email'];
        $inspection->mobile = $request['mobile'];
        $inspection->date = $request['date'];
        $inspection->next_inspection = Carbon::now()->endOfWeek(Carbon::FRIDAY)->format('d.m.Y');
        $inspection->number_plate = $request['number_plate'];
        $inspection->mileage = $request['mileage'];
        $inspection->save();

        $assign_id = $assign->id;
        $assign_id = Inspection::where('assign_id', $assign_id)->first();
        $data = $request->all();
        foreach ($data['view'] as $row => $value) {
            $data1 = array(
                'assign_id' => $assign_id->id,
                'view' => $data['view'][$row],
                'image' => $data['image'][$row],
                'feedback' => $data['feedback'][$row],
                // 'notes' => $data['notes'][$row],
                'action' => $data['action'][$row],
            );
            Visual::create($data1);
        }
        $data2 = $request->all();
        foreach ($data2['view'] as $key => $value) {
            $data3 = array(
                'assign_id' => $assign_id->id,
                'view' => $data2['view1'][$key],
                'image' => $data2['image1'][$key],
                'feedback' => $data2['feedback1'][$key],
                // 'notes'=> $data2['notes1'][$key],
                'action' => $data2['action1'][$key],
            );
            Vehiclecheck::create($data3);
        }
        $data4 = $request->all();
        foreach ($data4['view'] as $list => $value) {
            $data5 = array(
                'assign_id' => $assign_id->id,
                'view' => $data4['view2'][$list],
                'image' => $data4['image2'][$list],
                'feedback' => $data4['feedback2'][$list],
                // 'notes'=> $data4['notes2'][$list],
                'action' => $data4['action2'][$list],
            );
            Cabin::create($data5);
        }
    }

    public function inspection()
    {
        $inspection = Inspection::all();
        return view('/inspectiondetails', compact('inspection'));
    }
    public function deleteinspection($id)
    {
        Inspection::find($id)->delete();
        session()->flash('message1', ' Inspection detail is Deleted');
        return redirect('/inspectiondetails');
    }
}