<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sentral;
use Illuminate\Http\Request;
use App\Rules\SentralIdExistsRule;
use App\Helpers\Helper;

class SentralsController extends Controller
{
    public function dashboard()
    {
        return view("admin.mitra.dashboard");
    }
    public function index_sentral()
    {
        $sentrals = Sentral::all();
        return view('admin.mitra.sentrals', compact('sentrals'));
    }
    public function show_sentral($id)
    {
        $sentral = Sentral::findOrFail($id);

        return view('admin.sentrals.show_sentral', compact('sentral'));
    }
    public function destroy_sentral($id)
    {
        $sentral = Sentral::findOrFail($id);
        $sentral->delete();

        return redirect()->route('admin.mitra.index_sentral')->with('success', 'Mitra deleted successfully');
    }
    public function store_sentral(Request $request)
{
    // Validasi request
    $request->validate([
        'city' => 'required',
        'site_id' => 'required',
        'infra_sys_id' => 'required',
        'site_owner' => 'required',
        'id_sentral' => ['required', new SentralIdExistsRule],

    ]);

    // Simpan data ke database
    $sentrals = Sentral::create([
        'sentrals_id' => Helper::IDGenerator(Sentral::class, 'sentrals', 5, 'SNT'),
        'city' => $request->city,
        'site_id' => $request->site_id,
        'infra_sys_id' => $request->infra_sys_id,
        'site_owner' => $request->site_owner,
        'id_sentral' => $request->input('id_sentral'),

    ]);

    // Respon berhasil dengan SweetAlert
    return response()->json([
        'message' => 'Data berhasil disimpan',
        'data' => $sentrals, // Changed variable name to singular
        'sweetAlert' => [
            'icon' => 'success',
            'title' => 'Sukses!',
            'text' => 'Data berhasil ditambahkan.',
        ],
    ]);
}

}
