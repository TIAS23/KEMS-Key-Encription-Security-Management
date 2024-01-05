<?php

namespace App\Http\Controllers;

use App\Models\GKunci;
use App\Models\Kunci;
use App\Models\Sentral;
use App\Helpers\Helper;
use App\Rules\SentralIdExistsRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GKunciController extends Controller
{
    public function index()
    {
        $gkuncis = GKunci::all();
        return view('admin.engineer.gkuncis', compact('gkuncis'));
    }

    public function create()
{
    
    $sentrals = Sentral::all();
    $sentralCount = $sentrals->count();


    return view('admin.engineer.create_gkuncis', [
        'sentrals' => $sentrals,
        'sentralCount' => $sentralCount,
    ]);
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_sentral' => ['required', new SentralIdExistsRule],
        ]);

        $kuncis_id = Helper::IDGenerator(GKunci::class, 'kuncis_id', 5, 'KEY');

        $generatedCode = Kunci::generateUniqueCode();

        $kunci = Kunci::create([
            'generateCode' => $generatedCode,
        ]);

        $gkuncis = new GKunci([
            'kuncis_id' => $kuncis_id,
            'id_sentral' => $request->input('id_sentral'),
            'id_kunci' => $kunci->id, // Set the foreign key value
        ]);

        $gkuncis->save();

        return redirect()->route('gkuncis.index')->with('success', 'GKunci created successfully');
    }

    public function show($id)
{
    try {
        $gkuncis = GKunci::findOrFail($id);
        $generateCode = $gkuncis->kunci ? $gkuncis->kunci->generateCode : null;

        return view('admin.engineer.show', compact('gkuncis', 'generateCode'));
    } catch (\Exception $e) {
        return redirect()->route('gkuncis.index')->with('error', 'Gkuncis not found');
    }
}


public function edit($id)
{
    try {
        // Mengambil data GKunci berdasarkan ID
        $gkuncis = GKunci::findOrFail($id);
        
        // Mengambil semua data Sentral
        $sentrals = Sentral::all();

        return view('admin.engineer.edit_gkuncis', compact('gkuncis', 'sentrals'));
    } catch (\Exception $e) {
        // Jika data tidak ditemukan, redirect ke halaman index dengan pesan error
        return redirect()->route('gkuncis.index')->with('error', 'GKunci not found');
    }
}


public function update(Request $request, $id)
{
    $gkuncis = GKunci::findOrFail($id);

    $request->validate([
        'id_sentral' => ['required', new SentralIdExistsRule],
    ]);

    $gkuncis->update([
        'id_sentral' => $request->input('id_sentral'),
    ]);
    

    return redirect()->route('gkuncis.index')->with('success', 'GKuncs updated successfully');
}

    public function destroy($id)
    {
    try {
            $gkuncis = GKunci::findOrFail($id);
            $gkuncis->delete();
            return redirect()->route('gkuncis.index')->with('success', 'GKunci deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('gkuncis.index')->with('error', 'GKunci not found');
        }
    }

    public function verifyCode(Request $request)
    {
        // Ambil kode yang dihasilkan pertama kali (dari variabel generateCodeGK)
        $generateCode = $request->input('generateCodeGK'); // Ambil dari inputan form
    
        // Ambil kode yang dimasukkan oleh pengguna
        $inputCode = $request->input('inputCode');
    
        // Lakukan verifikasi
        if ($inputCode === $generateCode) {
            // Kode sesuai, tambahkan logika yang sesuai
    
            // Simpan data ke dalam tabel Kunci hanya setelah verifikasi berhasil
            $kunciData = [
                'generateCode' => $generateCode,
                // Tambahkan kolom-kolom lain yang perlu disimpan sesuai kebutuhan Anda
            ];
    
            // Cek apakah Kunci dengan generateCode ini sudah ada
            $kunci = Kunci::where('generateCode', $generateCode)->first();
    
            if (!$kunci) {
                // Jika belum ada, buat record baru
                $kunci = Kunci::create($kunciData);
            }
    
            // Sesuaikan dengan logika Anda untuk menghubungkan GKunci dengan Kunci
            GKunci::where('id', auth()->user()->gkuncis->id)->update([
                'id_kunci' => $kunci->id
            ]);
    
            return redirect()->route('gkuncis.index')->with('success', 'Kode berhasil diverifikasi.');
        } else {
            // Kode tidak sesuai, kembalikan dengan pesan kesalahan
            return redirect()->back()->with('error', 'Kode tidak sesuai. Silakan coba lagi.');
        }
    }
    
}

