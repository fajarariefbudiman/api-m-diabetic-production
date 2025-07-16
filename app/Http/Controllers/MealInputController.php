<?php

namespace App\Http\Controllers;

use App\Models\MealInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MealInputController extends Controller
{
    public function index()
    {
        $data = MealInput::where('user_id', Auth::id())->get();
        return response()->json($data);
    }

    public function show($id)
    {
        $meal = MealInput::find($id);
        if (!$meal || $meal->user_id !== Auth::id()) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
        return response()->json($meal);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'meal_type'   => 'required|string',
                'food_id'     => 'nullable|exists:foods,id',
                'manual_name' => 'nullable|string',
                'carbs'       => 'nullable|numeric',
                'sugar'       => 'nullable|numeric',
                'calories'    => 'nullable|numeric',
                'time'        => 'required|date_format:Y-m-d\TH:i:sP'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Terjadi kesalahan pada data yang Anda kirimkan. Mohon periksa kembali.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $input = $validator->validated();
            $input['user_id'] = Auth::id();

            $meal = MealInput::create($input);

            return response()->json([
                'message' => 'Data makan berhasil disimpan.',
                'data' => $meal
            ], 201);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan ke database.',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan tak terduga.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function destroy($id)
    {
        $meal = MealInput::find($id);
        if (!$meal || $meal->user_id !== Auth::id()) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $meal->delete();
        return response()->json(['message' => 'Log makanan berhasil dihapus.']);
    }
}
