<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

class TransactionController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mitras = Mitra::all();
        return view('admin.engineer.transactions', compact('mitras','user'));
    }
}
