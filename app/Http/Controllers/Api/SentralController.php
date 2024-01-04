<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sentral;
use Illuminate\Http\Request;
use App\Rules\SentralIdExistsRule;
use App\Helpers\Helper;

class SentralController extends Controller
{
    public function index()
    {
        return Sentral::all();
    }

    public function show(Sentral $sentral)
    {
        return $sentral;
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'site_id' => 'required',
            'infra_sys_id' => 'required',
            'site_owner' => 'required',
            'id_sentral' => ['required', new SentralIdExistsRule],
        ]);

        $sentral = Sentral::create([
            'sentrals_id' => Helper::IDGenerator(Sentral::class, 'sentrals', 5, 'SNT'),
            'city' => $request->city,
            'site_id' => $request->site_id,
            'infra_sys_id' => $request->infra_sys_id,
            'site_owner' => $request->site_owner,
            'id_sentral' => $request->input('id_sentral'),
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $sentral,
        ], 201);
    }

    public function update(Request $request, Sentral $sentral)
    {
        // Anda dapat menambahkan validasi lain sesuai kebutuhan untuk operasi update
        $sentral->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $sentral,
        ], 200);
    }

    public function destroy(Sentral $sentral)
    {
        $sentral->delete();

        return response()->json([
            'message' => 'Mitra berhasil dihapus',
        ], 200);
    }
}
