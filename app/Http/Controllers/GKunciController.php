<?php

namespace App\Http\Controllers;

use App\Models\GKunci;
use App\Models\Kunci; // Import the Kunci model at the top
use Illuminate\Http\Request;

class GKunciController extends Controller
{
    public function index()
    {
        $gkuncis = GKunci::all();

        return view('admin.engineer.gkuncis', compact('gkuncis'));
    }

    public function create()
    {
        $gkuncis = GKunci::all();

        return view('admin.engineer.create_gkuncis', compact('gkuncis'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'kuncis_id' => 'required',
        ]);

        
        $gkunci = new GKunci([
            'kuncis_id' => $request->get('kuncis_id'),
        ]);

        // Save the GKunci instance to the database
        $gkunci->save();



    return redirect()->route('gkuncis.index')->with('success', 'Created successfully');
    }

    public function show(GKunci $id)
    {
        $gkuncis = GKunci::findOrFail($id);

        return view('admin.engineer.show', compact('gkuncis'));
    }

    public function edit($id)
    {
        $gkuncis = GKunci::findOrFail();
        $gkuncis = GKunci::all(); // Fetch the sentrals from the database

        return view('admin.engineer.edit', compact('gkuncis'));
    }

    public function update(Request $request, GKunci $gkunci)
    {
        $request->validate([
            'kuncis_id' => 'required',
            'generate_id' => 'required',
        ]);

        $gkunci->update($request->all());

        return redirect()->route('gkuncis.index')
            ->with('success', 'GKunci updated successfully');
    }

    public function destroy(GKunci $gkunci)
    {
        $gkunci->delete();

        return redirect()->route('gkuncis.index')
            ->with('success', 'GKunci deleted successfully');
    }
}
