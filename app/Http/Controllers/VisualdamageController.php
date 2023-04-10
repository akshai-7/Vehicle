<?php

namespace App\Http\Controllers;

use App\Models\Visual;
use App\Models\Vehiclecheck;
use App\Models\Cabin;
use App\Models\Inspection;
use Illuminate\Http\Request;


class VisualdamageController extends Controller
{
    public function check($inspection_id)
    {

        $visual = Visual::where('inspection_id', $inspection_id)->first();
        if ($visual == null) {
            session()->flash('message1', ' Invalid Id');
            return redirect('/inspectiondetails');
        }
        $visual = Visual::where('inspection_id', $inspection_id)->get();
        $vehicle = Vehiclecheck::where('inspection_id', $inspection_id)->get();
        $cabin = Cabin::where('inspection_id', $inspection_id)->get();
        return view('/details', ['cabin' => $cabin, 'visual' => $visual, 'vehicle' => $vehicle,]);
    }

    public function updatevisualcheck($id)
    {
        $visual = Visual::where('id', $id)->get();
        return view('/updatevisualcheck', ['visual' => $visual]);
    }
    public function visualimages($id)
    {
        $visual = Visual::where('id', $id)->first();
        return view('/visualimages', ['visual' => $visual]);
    }
    public function visualupdate(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'view' => 'required',
            'image' => 'required',
            'feedback' => 'required',
            'action' => 'required',

        ]);

        $id = $request->inspection_id;
        $data1 = Inspection::find($id);
        if ($data1 == null) {
            session()->flash('message', ' Invalid Id');
        }

        $data2 = $request->id;
        $data3 = Visual::find($data2);
        if ($data3 == null) {
            session()->flash('message', ' Invalid Id');
        }

        $visual = Visual::where('inspection_id', $data1->id)->where('id', $data3->id)->first();
        $visual->view = $request['view'];
        $data = $request->all();
        $img = array();
        for ($i = 0; $i < count($data['image']); $i++) {
            $imageName = time() . '.' . $data['image'][$i]->getClientOriginalName();
            $data['image'][$i]->move(public_path('images'), $imageName);
            array_push($img, $imageName);
        }
        $data4 = array(
            'image' =>  implode(",", $img),
        );
        $visual->image = $data4['image'];
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
        $data = $user->inspection_id;
        session()->flash('message1', 'Deleted');
        return redirect('/details/' . $data);
    }
}
