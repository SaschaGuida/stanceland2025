<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $totalApplications = EventApplication::count();
        $countNord = EventApplication::where('evento', 'nord')->count();
        $countSud = EventApplication::where('evento', 'sud')->count();
        $latestApplications = EventApplication::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalApplications',
            'countNord',
            'countSud',
            'latestApplications'
        ));
    }
}
