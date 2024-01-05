<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kunci;
use App\Models\GKunci;
use App\Models\Mitra; // Assuming you have a Mitra model
use Illuminate\Http\Request;
use App\Helpers\HelperFunctions;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class KunciController extends Controller
{
    public function index()
    {
        $kuncis = Kunci::all();
        return view('admin.engineer.kode', compact('kuncis'));
    }

    public function create()
    {
        return view('kuncis.create_kunci');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_sentral' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/posts', $image->hashName());
        } else {
            $imagePath = null;
        }

        // Generate unique code using HelperFunctions
        $generateCode = HelperFunctions::generateRandomNumber(4);
        $unique_code = Helper::IDGenerator(Mitra::class, 'unique_code', 5, 'LA');

        // Buat instance Kunci dan simpan ke database
        $kunci = new Kunci([
            'id_sentral' => $request->input('id_sentral'),
            'generateCode'=>$generateCode,
            'unique_code' => $unique_code,
            'image' => $imagePath,
        ]);

        $kunci->save();

        return redirect()->route('kuncis.index')->with('success', 'Kunci created successfully');
    }

    public function generateCode($mitraId)
{
    $mitra = Mitra::find($mitraId);

    // Check if the Mitra model exists
    if (!$mitra) {
        return response()->json(['error' => 'Mitra not found'], 404);
    }

    // Contoh logika untuk menghasilkan kode berdasarkan entitas mitra
    $generateCode = HelperFunctions::generateRandomNumber(4);

    // Create a new instance of the Kunci model
    $kunci = new Kunci();

    // Assign values to the model attributes
    $kunci->generateCode = $generateCode; // Assuming 'generatedCode' is the correct column name

    // Save the model to the database
    $kunci->save();

    // Tampilkan view dengan kode yang dihasilkan
    return view('admin.mitra.generateCode', ['mitra' => $mitra, 'generateCode' => $generateCode]);
}

public function generateCodeGK($gkunciId)
{
    $gkuncis = GKunci::find($gkunciId);

    if (!$gkuncis) {
        return response()->json(['error' => 'Kunci not found'], 404);
    }

    $generateCode = HelperFunctions::generateRandomNumber(4);

    $kunci = new Kunci();

    $kunci->generateCode = $generateCode;

    $kunci->save();

    return view('admin.engineer.generateCode', ['gkuncis' => $gkuncis, 'generateCodeGK' => $generateCode]);
}


}
