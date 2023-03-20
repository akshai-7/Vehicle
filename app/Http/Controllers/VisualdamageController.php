<?php

namespace App\Http\Controllers;

use App\Models\Visual;
use App\Models\Vehiclecheck;
use App\Models\Cabin;
use App\Models\Inspection;
use Illuminate\Http\Request;

class VisualdamageController extends Controller
{
    public function check($assign_id)
    {
        $visual = Visual::where('assign_id', $assign_id)->get();
        $vehicle = Vehiclecheck::where('assign_id', $assign_id)->get();
        $cabin = Cabin::where('assign_id', $assign_id)->get();
        return view('/details', ['cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle]);
    }

    public function updatevisualcheck($id)
    {
        $visual = Visual::where('id', $id)->get();
        return view('/updatevisualcheck', ['visual' => $visual]);
    }
    public function visualupdate(Request $request, $id)
    {

        $request->validate([
            'view' => 'required',
            'image' => 'required',
            'feedback' => 'required',
            'action' => 'required',
        ]);
        $id = $request->assign_id;
        $data1 = Inspection::find($id);
        if ($data1 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }

        $data2 = $request->id;

        $data3 = Visual::find($data2);
        if ($data3 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $visual = Visual::where('assign_id', $data1->id)->where('id', $data3->id)->first();
        $visual->view = $request['view'];
        $visual->image = $request['image'];
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $location = public_path($name);
            $visual->image = $name;
        }
        $visual->feedback = $request['feedback'];
        $visual->action = $request['action'];
        $visual->save();
        session()->flash('message', ' Updated Successfully');
        return redirect('/details/' . $data1->id);
    }
    public function deletevisual($id)
    {
        $user = Visual::find($id);
        $user->delete();
        $data = $user->assign_id;
        session()->flash('message1', 'Deleted');
        return redirect('/details/' . $data);
    }
}
