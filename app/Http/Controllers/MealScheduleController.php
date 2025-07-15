<?php

namespace App\Http\Controllers;

use App\Models\MealSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MealScheduleController extends Controller
{
    public function index()
    {
        $schedules = MealSchedule::where('user_id', Auth::id())->get();
        return response()->json($schedules);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meal_time' => 'required|date_format:Y-m-d\TH:i:sP',
            'meal_type' => 'required|in:breakfast,lunch,dinner,snack',
            'calories_target' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada data yang Anda kirimkan. Mohon periksa kembali.',
                'errors' => $validator->errors()
            ], 422);
        }

        $schedule = MealSchedule::create([
            'user_id' => Auth::id(),
            'meal_time' => $request->meal_time,
            'meal_type' => $request->meal_type,
            'calories_target' => $request->calories_target
        ]);

        return response()->json($schedule, 201);
    }

    public function destroy($id)
    {
        $schedule = MealSchedule::find($id);
        if (!$schedule || $schedule->user_id !== Auth::id()) {
            return response()->json(['message' => 'Jadwal tidak ditemukan.'], 404);
        }

        $schedule->delete();
        return response()->json(['message' => 'Jadwal berhasil dihapus.']);
    }
}
