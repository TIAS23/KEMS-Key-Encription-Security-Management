<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade

class EngineerController extends Controller
{
    public function index()
    {
        // Get all Mitras
        $mitras = Mitra::all();

        // Pass Mitras data to the view
        return view('admin.engineer.approval_order', compact('mitras'));
    }

    public function approve(Request $request, Mitra $mitra)
    {
        // Validate the form data
        $request->validate([
            'approve' => 'required|in:approved,rejected',
        ]);

        try {
            // Update the Mitra's approval status
            $mitra->update(['approve' => $request->approve]);

            // Redirect with success message
            return redirect()->route('engineers.index')->with('success', 'Approval status updated successfully.');
        } catch (\Exception $e) {
            // Handle the exception, log it, or redirect with an error message
            Log::error('Error updating approval status: ' . $e->getMessage()); // Use Log without a backslash

            return redirect()->route('engineers.index')->with('error', 'An error occurred while updating approval status.');
        }
    }
}
