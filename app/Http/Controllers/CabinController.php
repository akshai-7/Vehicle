<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\Cabin;

class CabinController extends Controller
{

    public function cabinimages($id)
    {

        $cabin = Cabin::where('id', $id)->first();
        return view('/cabinimages', ['cabin' => $cabin]);
    }
    public function updatecabincheck($id)
    {
        $cabin = Cabin::where('id', $id)->get();
        return view('/updatecabincheck', ['cabin' => $cabin]);
    }
    public function cabinupdate(Request $request, $id)
    {
        $request->validate([
            'view' => 'required',
            'image' => 'required',
            'feedback' => 'required',
            'action' => 'required',
        ]);
        $id = $request->inspection_id;
        $data1 = Inspection::find($id);
        if ($data1 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $data2 = $request->id;
        $data3 = Cabin::find($data2);
        if ($data3 == null) {
            return response()->json(['message' => 'Invalid Id']);
        }
        $cabin = Cabin::where('inspection_id', $data1->id)->where('id', $data3->id)->first();
        $cabin->view = $request['view'];
        $cabin->image = $request['image'];
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $location = public_path($name);
            $cabin->image = $name;
        }
        $cabin->feedback = $request['feedback'];
        $cabin->action = $request['action'];
        $cabin->save();
        session()->flash('message', ' Updated Successfully');
        return redirect('/details/' . $data1->id);
    }
    public function deletecabin($id)
    {
        $user = Cabin::find($id);
        $user->delete();
        $data = $user->inspection_id;
        session()->flash('message1', 'Deleted');
        return redirect('/details/' . $data);
    }
}
