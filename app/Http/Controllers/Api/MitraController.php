<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MitraResource;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{

    public function index()
{
    return Mitra::all();
}
    
    public function show($id)
    {
        $mitra = Mitra::with('user')->findOrFail($id);
        return new MitraResource($mitra);
    }
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();

        return response()->json(['message' => 'Mitra deleted successfully']);
    }
}
