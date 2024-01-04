<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\GKunci;
use App\Models\Sentral;
use App\Models\User; // Import the User model at the top
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use App\Rules\KunciIdExistsRule;
use App\Rules\SentralIdExistsRule;
use App\Models\Kunci; // Import the Kunci model at the top
use Illuminate\Support\Facades\Session;

class MitraController extends Controller
{
    public function dashboard()
    {
        return view("admin.mitra.dashboard");
    }

    public function index()
    {
        $currentUser = auth()->user();
        $mitras = Mitra::with('user')->where('id_users', $currentUser->id)->get();
    
        return view('admin.mitra.mitras', compact('mitras'));
    }

    public function create()
    {
        $sentrals = Sentral::all();
        $gkuncis = GKunci::all();
        $gkuncisCount = $gkuncis->count();
        $sentralCount = $sentrals->count();
        $currentUser = auth()->user();
    
        $company = $currentUser->company;

        return view('admin.mitra.create', [
            'sentrals' => $sentrals,
            'gkuncis' => $gkuncis,
            'gkuncisCount' => $gkuncisCount,
            'sentralCount' => $sentralCount,
            'nama_perusahaan_mitra' => $company ? $company->name_company : '',
            'nama_petugas' => $currentUser->name,
        ]);
    }
    
    public function store(Request $request)
{
    $request->validate([
        'nama_perusahaan_mitra' => 'required|string|max:255',
        'nama_petugas' => 'required|string|max:255',
        'pekerjaan' => 'required|string',
        'kuncis_id' => ['required', new KunciIdExistsRule],
        'id_sentral' => ['required', new SentralIdExistsRule],
    ]);

    
    $mitras_id = Helper::IDGenerator(Mitra::class, 'mitras_id', 5, 'PNJ');

    $currentUser = auth()->user();

    // Generate and store the unique code
    $generatedCode = Kunci::generateUniqueCode();

    // Create a new Kunci record
    $kunci = Kunci::create([
        'generateCode' => $generatedCode,
    ]);

    // Create a new Mitra record and associate it with the newly created Kunci record
    $mitra = new Mitra([
        'mitras_id' => $mitras_id,
        'pekerjaan' => $request->input('pekerjaan'),
        'id_sentral' => $request->input('id_sentral'),
        'kuncis_id' => $request->input('kuncis_id'),
        'user_id' => $currentUser->id,
        'id_users' => $currentUser->id,
        'id_kunci' => $kunci->id, // Set the foreign key value
    ]);

    // Save additional fields
    $mitra->nama_perusahaan_mitra = $request->input('nama_perusahaan_mitra');
    $mitra->nama_petugas = $request->input('nama_petugas');

    $mitra->save();

    return redirect()->route('mitras.index')->with('success', 'Mitra created successfully');
}

public function show($id)
{
    try {
        $mitra = Mitra::findOrFail($id);
        $generateCode = $mitra->kunci ? $mitra->kunci->generateCode : null;

        return view('admin.mitra.show', compact('mitra', 'generateCode'));
    } catch (\Exception $e) {
        return redirect()->route('mitras.index')->with('error', 'Mitra not found');
    }
}


public function edit($id)
{
    try {
        $mitra = Mitra::findOrFail($id);
        $sentrals = Sentral::all();
        $gkuncis = GKunci::all();

        
        // Fetch the company name from the logged-in user and pass it to the view
        $currentUser = auth()->user();
        $nama_perusahaan_mitra = $currentUser->company ? $currentUser->company->name_company : '';

        return view('admin.mitra.edit', compact('mitra', 'sentrals', 'nama_perusahaan_mitra'));
    } catch (\Exception $e) {
        return redirect()->route('mitras.index')->with('error', 'Mitra not found');
    }
}


    public function update(Request $request, $id)
{
    $mitra = Mitra::findOrFail($id);

    $request->validate([
        'nama_perusahaan_mitra' => 'required|string|max:255',
        'nama_petugas' => 'required|string|max:255',
        'pekerjaan' => 'required|string',
        'kuncis_id' => ['required', new KunciIdExistsRule],
        'id_sentral' => ['required', new SentralIdExistsRule],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102048',
    ]);

    // Handle image upload/update
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($mitra->image) {
            Storage::disk('public')->delete($mitra->image);
        }

        // Upload the new image
        $image = $request->file('image');
        $imagePath = $image->storeAs('public/posts', $image->hashName());
        $mitra->image = $imagePath;
    }
    

    // Update other fields
    $mitra->update([
        'nama_perusahaan_mitra' => $request->input('nama_perusahaan_mitra'),
        'nama_petugas' => $request->input('nama_petugas'),
        'pekerjaan' => $request->input('pekerjaan'),
        'kuncis_id' => $request->input('kuncis_id'),
        'id_sentral' => $request->input('id_sentral'),
    ]);
    

    return redirect()->route('mitras.index')->with('success', 'Mitra updated successfully');
}


    public function destroy($id)
    {
        try {
            $mitra = Mitra::findOrFail($id);
            $mitra->delete();
            return redirect()->route('mitras.index')->with('success', 'Mitra deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('mitras.index')->with('error', 'Mitra not found');
        }
    }

    public function verifyCode(Request $request)
    {
        // Ambil kode yang dihasilkan pertama kali (contoh: dari variabel sesi)
        $generatedCode = Session::get('generatedCode');

        // Ambil kode yang dimasukkan oleh pengguna
        $inputCode = $request->input('inputCode');

        // Lakukan verifikasi
        if ($inputCode === $generatedCode) {
            // Kode sesuai, tambahkan logika yang sesuai, misalnya, berhasil verifikasi

            // Simpan data ke dalam tabel Kunci hanya setelah verifikasi berhasil
            $kunciData = [
                'id_kunci' => auth()->user()->mitra->id,
                'generatedCode' => $generatedCode,
                // Tambahkan kolom-kolom lain yang perlu disimpan
            ];

            // Sesuaikan dengan nama model dan kolom yang sesuai
            $kunci = Kunci::where($kunciData)->first();

            if (!$kunci) {
                $getid = Kunci::create($kunciData);

                Mitra::where("id", auth()->user()->mitra->id)->update([
                    "id_kunci" => $getid->id
                ]);
            }

            return redirect()->route('mitras.index')->with('success', 'Kode berhasil diverifikasi.');
        } else {
            // Kode tidak sesuai, tambahkan logika yang sesuai, misalnya, redirect kembali ke halaman verifikasi
            return redirect()->back()->with('error', 'Kode tidak sesuai. Silakan coba lagi.');
        }
    }

    
}
