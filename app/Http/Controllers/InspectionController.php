<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\Visual;
use App\Models\Vehiclecheck;
use App\Models\Cabin;
use App\Models\Assign;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Mail\inspectionMail;


class InspectionController extends Controller
{
    public function store(Request $request)
    {
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
        $inspection->report_no = $assign->number_plate . date('d/m/Y');
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
        $assign->report_no = $inspection->report_no;
        $assign->last_inspection = $inspection->date;
        $assign->next_inspection = $inspection->next_inspection;
        $assign->save();

        $assign_id = $assign->id;
        $assign_id = Inspection::where('assign_id', $assign_id)->latest('id')->first();
        $data = $request->all();
        foreach ($data['view'] as $row => $value) {
            $img = array();
            for ($i = 0; $i < count($data[$data['view'][$row]]); $i++) {
                $imageName = time() . '.' . $data[$data['view'][$row]][$i]->getClientOriginalName();
                $data[$data['view'][$row]][$i]->move(public_path('images'), $imageName);
                array_push($img, $imageName);
            }
            $data1 = array(
                'inspection_id' => $assign_id->id,
                'view' => $data['view'][$row],
                'image' =>  implode(",", $img),
                'feedback' => $data['feedback'][$row],
                'notes' => $data['notes'][$row],
                'action' => $data['action'][$row],
            );
            Visual::create($data1);
        }

        $data2 = $request->all();
        foreach ($data2['view1'] as $key => $value) {
            $img1 = array();
            if (isset($data2[$data2['view1'][$key]])) {
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
            } else {
                $data3 = array(
                    'inspection_id' => $assign_id->id,
                    'view' => $data2['view1'][$key],
                    'image' => null,
                    'feedback' => $data2['feedback1'][$key],
                    'notes' => $data2['notes1'][$key],
                    'action' => $data2['action1'][$key],
                );
            }
            Vehiclecheck::create($data3);
        }
        $data4 = $request->all();
        foreach ($data4['view2'] as $list => $value) {
            $img2 = array();
            if (isset($data4[$data4['view2'][$list]])) {
                for ($i = 0; $i < count($data4[$data4['view2'][$list]]); $i++) {
                    $imageName = time() . '.' . $data4[$data4['view2'][$list]][$i]->getClientOriginalName();
                    $data4[$data4['view2'][$list]][$i]->move(public_path('images'), $imageName);
                    array_push($img2, $imageName);
                }
                $data5 = array(
                    'inspection_id' => $assign_id->id,
                    'view' => $data4['view2'][$list],
                    'image' => implode(",", $img2),
                    'feedback' => $data4['feedback2'][$list],
                    'notes' => $data4['notes2'][$list],
                    'action' => $data4['action2'][$list],
                );
            } else {
                $data5 = array(
                    'inspection_id' => $assign_id->id,
                    'view' => $data4['view2'][$list],
                    'image' => null,
                    'feedback' => $data4['feedback2'][$list],
                    'notes' => $data4['notes2'][$list],
                    'action' => $data4['action2'][$list],
                );
            }
            Cabin::create($data5);
        }
        $name = [
            'name' => $assign->name,
        ];
        Mail::To($assign->email)->send(new inspectionMail($name));
        session()->flash('message', 'Vehicle Inspection  Successfully');
        return redirect('/inspectiondetails');
    }

    public function inspection()
    {
        $inspections = Inspection::paginate(10);
        $assigns = Assign::paginate(10);
        return view('/inspectiondetails', compact('inspections', 'assigns'));
    }
    public function deleteinspection($id)
    {
        Inspection::find($id)->delete();
        Visual::where('inspection_id', $id)->delete();
        Vehiclecheck::where('inspection_id', $id)->delete();
        Cabin::where('inspection_id', $id)->delete();
        session()->flash('message1', ' Inspection details Deleted');
        return redirect('/inspectiondetails');
    }
    public function search(Request $request)
    {
        $assigns = Assign::paginate(10);
        if ($request->name == "Select Name" && $request->date == 'Select Date') {
            $inspections = Inspection::paginate(10);
        } elseif ($request->name == "Select Name" && $request->date != 'Select Date') {
            $inspections = Inspection::where('date', $request->date)->paginate(10);
        } elseif ($request->name != "Select Name" && $request->date == 'Select Date') {
            $inspections = Inspection::where('name', $request->name)->paginate(10);
        } else {
            $inspections = Inspection::where('created_at', $request->date)->where('name', $request->name)->paginate(10);
        }
        return view('/inspectiondetails', compact('inspections', 'assigns'));
    }
    public function inspectionsearchbar(Request $request)
    {
        $assigns = Assign::paginate(10);
        $query = $request['query'];
        $inspections = Inspection::where('number_plate', 'LIKE', "%$query%")
            ->orWhere('inspected_by', 'LIKE', "%$query%")
            ->orWhere('report_no', 'LIKE', "%$query%")
            ->paginate(10);
        return view('/inspectiondetails', compact('inspections', 'assigns'));
    }
    public function archive()
    {
        $inspections = Inspection::get();
        return view('/archive', ['inspections' => $inspections]);
    }
    public function searcharchive(Request $request)
    {
        $month =  $request->month;
        $year = $request->year;
        if ($year == 'Select Year' && $month != 'Select Month') {
            session()->flash('message1', ' Please Select The Year');
            $inspections = Inspection::get();
        } elseif ($year == 'Select Year' &&  $month = 'Select Month') {
            $inspections = Inspection::get();
        } elseif ($year != 'Select Year' &&  $month != 'Select Month') {
            $inspections = Inspection::whereYear('date',  $year)->whereMonth('date', $month)->get();
        } else {
            $inspections = Inspection::whereYear('date',  $year)->get();
        }
        return view('/archive', ['inspections' => $inspections]);
    }
}
