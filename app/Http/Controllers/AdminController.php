<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view ('admin.dashboard');
    }

    public function engineer()
    {
        return view ('admin.engineer.dashboard');
    }

    public function mitra()
    {
        return view ('admin.mitra.dashboard');
    }


}
