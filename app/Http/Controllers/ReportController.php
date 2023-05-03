<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assign;
use App\Models\Report;

class ReportController extends Controller
{
    public function updatereport($id)
    {
        $report = Report::where('id', $id)->get();
        return view('/updatereport', compact('report'));
    }
    public function reportimages($id)
    {
        $reports = Report::where('id', $id)->first();
        return view('/reportimages', compact('reports'));
    }

    public function reportonincident(Request $request)

    {
        dd($request);
        $request->validate([
            'date' => 'required',
            'location' => 'required',
            'witnessed_by' => 'required',
            'mobile' => 'required',
            'statement' => 'required',

        ]);
        $assign = Assign::where('name', $request->name)->first();
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

        return redirect('/reportlist');
    }
    public function reportlist()
    {
        $assigns = Assign::all();
        $reports = Report::with('assign')->paginate(5);
        return view('/reportlist', ['reports' => $reports], ['assigns' => $assigns]);
    }
    public function deletereport($id)
    {
        Report::find($id)->delete();
        session()->flash('message1', ' Reportedincident Deleted');
        return redirect('/reportlist');
    }
    public function searchreport(Request $request)
    {
        $assigns = Assign::all();
        if ($request->name == "Select Name" && $request->date == 'Select Date') {
            $reports = Report::with('assign')->get();
        } elseif ($request->name == "Select Name" && $request->date != 'Select Date') {
            $reports = Report::where('date', $request->date)->get();
        } elseif ($request->name != "Select Name" && $request->date == 'Select Date') {
            $assign = Assign::where('name', $request->name)->first();
            $reports = Report::where('assign_id', $assign->id)->get();
        } else {
            $assign = Assign::where('name', $request->name)->first();
            $reports = Report::where('assign_id', $assign->id)->where('date', $request->date)->get();
        }
        return view('/reportlist', ['reports' => $reports], ['assigns' => $assigns]);
    }
    public function reportsearchbar(Request $request)
    {
        $assigns = Assign::all();
        $query = $request['query'];
        $reports = Report::where('witnessed_by', 'LIKE', "%$query%")
            ->orWhere('location', 'LIKE', "%$query%")
            ->orWhere('id', 'LIKE', "%$query%")
            ->paginate(10);
        return view('/reportlist', ['reports' => $reports], ['assigns' => $assigns]);
    }
}
