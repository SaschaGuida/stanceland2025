<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventApplication;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Se è un admin
        if ($user->role === 'admin') {
            $totalApplications = EventApplication::count();
            $countNord = EventApplication::where('evento', 'nord')->count();
            $countSud = EventApplication::where('evento', 'sud')->count();
            $latestApplications = EventApplication::latest()->take(5)->get();

            return view('admin.dashboard', compact(
                'totalApplications',
                'countNord',
                'countSud',
                'latestApplications'
            ));
        }

        // Se è un utente normale
        $application = EventApplication::where('email', $user->email)->first();

        return view('user.userdashboard', compact('application'));
    }

    public function userselection(): View
    {
        $user = Auth::user();
        $application = EventApplication::where('email', $user->email)->first();

        return view('user.userselection', compact('application'));
    }
}
