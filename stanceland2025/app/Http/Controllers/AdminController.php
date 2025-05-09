<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function nord()
    {
        return view('admin.nord');
    }

    public function sud()
    {
        return view('admin.sud');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function eventi()
    {
        return view('admin.eventi');
    }
}
