<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KunciResource;
use App\Models\Kunci;
use App\Models\Mitra;
use App\Helpers\HelperFunctions;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KunciController extends Controller
{
    public function index()
    {
        $kuncis = Kunci::all();
        return response()->json(['data' => KunciResource::collection($kuncis)], 200);
    }

    public function create()
    {
        // For APIs, you might not need a create method as it's typically handled by a POST request to store().
        // If you need a specific create view or functionality for an API, you can add it here.
        return response()->json(['message' => 'Method not allowed.'], 405);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_sentral' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/posts', $image->hashName());
        }

        $generateCode = HelperFunctions::generateRandomNumber(4);
        $unique_code = Helper::IDGenerator(Mitra::class, 'unique_code', 5, 'LA');

        $kunci = new Kunci([
            'id_sentral' => $request->input('id_sentral'),
            'generateCode' => $generateCode,
            'unique_code' => $unique_code,
            'image' => $imagePath,
        ]);

        $kunci->save();

        return response()->json(['message' => 'Kunci created successfully.', 'data' => new KunciResource($kunci)], 201);
    }

    public function generateCode($mitraId)
    {
        $mitra = Mitra::find($mitraId);

        if (!$mitra) {
            return response()->json(['error' => 'Mitra not found'], 404);
        }

        $generateCode = HelperFunctions::generateRandomNumber(4);

        $kunci = new Kunci();
        $kunci->generateCode = $generateCode;
        $kunci->save();

        return response()->json(['message' => 'Code generated successfully.', 'generateCode' => $generateCode], 200);
    }
}
