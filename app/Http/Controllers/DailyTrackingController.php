<?php

namespace App\Http\Controllers;

use App\Models\DailyTracking;
use App\Http\Requests\StoreDailyTrackingRequest;
use App\Http\Requests\UpdateDailyTrackingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyTrackingController extends Controller
{
    public function index()
    {
        return DailyTracking::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'weight' => 'nullable|numeric',
            'glucose_level' => 'nullable|numeric',
            'water_intake' => 'nullable|numeric',
            'sleep_hours' => 'nullable|numeric',
            'calories_total' => 'nullable|numeric'
        ]);

        $tracking = DailyTracking::updateOrCreate(
            ['user_id' => Auth::id(), 'date' => $validated['date']],
            array_merge(['user_id' => Auth::id()], $validated)
        );

        return response()->json($tracking, 201);
    }

    public function show($date)
    {
        $tracking = DailyTracking::where('user_id', Auth::id())
            ->where('date', $date)
            ->first();

        if (!$tracking) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        return response()->json($tracking);
    }

    public function destroy($date)
    {
        $deleted = DailyTracking::where('user_id', Auth::id())
            ->where('date', $date)
            ->delete();

        if (!$deleted) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
