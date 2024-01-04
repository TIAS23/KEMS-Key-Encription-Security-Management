<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sentral;
use App\Rules\SentralIdExistsRule;
use Illuminate\Http\Request;
use App\Helpers\Helper;


class SentralController extends Controller
{
    public function dashboard()
    {
        return view("admin.engineer.dashboard");
    }

    public function index()
    {
        $sentrals = Sentral::all();
        return view('admin.engineer.sentrals', compact('sentrals'));
    }

    public function create()
    {
        $sentrals = Sentral::all();
        $sentralCount = $sentrals->count();

        return view('admin.engineer.create_sentral_data', compact('sentrals', 'sentralCount'));
    }

    public function store(Request $request)
{
    // Validation logic
    $request->validate([
        'CITY' => 'required|string',
        'SITE_ID' => 'required|string',
        'INFRA_SYS_ID' => 'required|string',
        'SITE_OWNER_ID' => 'required|string',
        'INFRA_TYPE' => 'required|string',
        'INFRA_SUB_TYPE' => 'required|string',
        'ADDRESS' => 'required|string',
        'LATITUDE' => 'required|string',
        'LONGITUDE' => 'required|string',
    ]);

    // Ambil sentral terbaru untuk mendapatkan ID berikutnya
    $lastSentral = Sentral::orderBy('id', 'desc')->first();

    // Jika ada sentral sebelumnya, ambil angka dari ID dan tambahkan 1
    if ($lastSentral) {
        $lastIdNumber = intval(substr($lastSentral->sentrals_id, 4)); // Ambil angka dari 'SNT-xxxxx'
        $nextIdNumber = $lastIdNumber + 1;
        $nextId = 'SNT-' . str_pad($nextIdNumber, 5, '0', STR_PAD_LEFT);
    } else {
        $nextId = 'SNT-00001'; // Jika belum ada sentral lain
    }

    // Create a new Sentral instance and save it with the generated ID
    Sentral::create([
        'sentrals_id' => $nextId,
        'CITY' => $request->input('CITY'),
        'SITE_ID' => $request->input('SITE_ID'),
        'INFRA_SYS_ID' => $request->input('INFRA_SYS_ID'),
        'SITE_OWNER_ID' => $request->input('SITE_OWNER_ID'),
        'INFRA_TYPE' => $request->input('INFRA_TYPE'),
        'INFRA_SUB_TYPE' => $request->input('INFRA_SUB_TYPE'),
        'ADDRESS' => $request->input('ADDRESS'),
        'LATITUDE' => $request->input('LATITUDE'),
        'LONGITUDE' => $request->input('LONGITUDE'),
    ]);

    return redirect()->route('sentrals.index')->with('success', 'Sentral created successfully');
}


    public function show($id)
    {
        $sentral = Sentral::findOrFail($id);

        return view('admin.engineer.show', compact('sentral'));
    }

    public function edit($id)
    {
        $sentral = Sentral::findOrFail($id);
        $sentrals = Sentral::all(); // Fetch the sentrals from the database

        return view('admin.engineer.edit', compact('sentral','sentrals'));
    }

    public function destroy($id)
    {
        $sentral = Sentral::findOrFail($id);
        $sentral->delete();

        return redirect()->route('sentrals.index')->with('success', 'Sentral deleted successfully');
    }
}
