<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Food::all());
    }

    public function show($id)
    {
        $food = Food::find($id);
        if (!$food) {
            return response()->json(['message' => 'Makanan tidak ditemukan.'], 404);
        }
        return response()->json($food);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'carbs' => 'required|numeric',
            'sugar' => 'required|numeric',
            'calories' => 'required|numeric',
            'brand' => 'nullable|string',
            'protein' => 'nullable|numeric',
            'fat' => 'nullable|numeric',
            'category' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada data yang Anda kirimkan. Mohon periksa kembali.',
                'errors' => $validator->errors()
            ], 422);
        }

        $food = Food::create($validator->validated());
        return response()->json($food, 201);
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        if (!$food) {
            return response()->json(['message' => 'Makanan tidak ditemukan.'], 404);
        }

        $food->delete();
        return response()->json(['message' => 'Makanan berhasil dihapus.']);
    }
}
