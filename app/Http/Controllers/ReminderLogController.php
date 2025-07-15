<?php

namespace App\Http\Controllers;

use App\Models\ReminderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderLogController extends Controller
{
    public function index()
    {
        return ReminderLog::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'is_taken' => 'required|boolean',
            'category' => 'nullable|string'
        ]);

        $exists = ReminderLog::where('user_id', Auth::id())
            ->whereDate('date', $request->date)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Log pada tanggal ini sudah tercatat.'], 200);
        }

        $log = ReminderLog::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'is_taken' => $request->is_taken,
            'category' => $request->category ?? 'anemia'
        ]);

        return response()->json($log, 201);
    }
}
