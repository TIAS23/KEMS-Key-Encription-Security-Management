<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MitraResource;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Get all Mitras
        $mitras = Mitra::all();

        // Return a JSON response with Mitras data
        return response()->json(['data' => MitraResource::collection($mitras)], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\JsonResponse
     */
    public function approve(Request $request, Mitra $mitra)
    {
        // Validate the form data
        $request->validate([
            'approve' => 'required|in:approved,rejected',
        ]);

        try {
            // Update the Mitra's approval status
            $mitra->update(['approve' => $request->approve]);

            // Return a success JSON response
            return response()->json(['message' => 'Approval status updated successfully.'], 200);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error updating approval status: ' . $e->getMessage());

            // Return an error JSON response
            return response()->json(['message' => 'An error occurred while updating approval status.'], 500);
        }
    }
}
