<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assign;
use App\Models\Report;

class ReportController extends Controller
{
    public function report($id)
    {
        $report = Assign::where('id', $id)->first();
        return view('/report', compact('report'));
    }

    public function reportonincident(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'location' => 'required',
            'witnessed_by' => 'required',
            'mobile' => 'required',
            'statement' => 'required',
            'image' => 'required',
        ]);
        $name = $request->name;
        $assign = Assign::where('name', $name)->first();
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
        $report->save();
        return redirect('/reportlist');
    }
    public function reportlist()
    {
        $report = Report::all();
        return view('/reportlist', compact('report'));
    }
    public function deletereport($id)
    {
        Report::find($id)->delete();
        session()->flash('message1', ' Report is Deleted');
        return redirect('/reportlist');
    }
}
