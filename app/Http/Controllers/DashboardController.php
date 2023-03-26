<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Assign;
use App\Models\Inspection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $role = 'user';
        $user = User::where('role', $role)->count();
        $vehicle = Vehicle::count();
        $assign = Assign::count();
        $inspection = Inspection::count();
        return view('/dashboard', compact('user', 'vehicle', 'assign', 'inspection'));
    }
}
