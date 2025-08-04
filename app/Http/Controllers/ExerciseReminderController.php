<?php

namespace App\Http\Controllers;

use App\Models\ExerciseReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseReminderController extends Controller
{
    public function index()
    {
        $reminders = ExerciseReminder::where('user_id', Auth::id())->get();
        return response()->json($reminders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exercise_type' => 'required|string|max:255',
            'scheduled_time' => 'required|date_format:H:i',
            'duration_minutes' => 'required|integer',
            'video_url' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        $reminder = ExerciseReminder::create($validated);

        return response()->json([
            'message' => 'Pengingat olahraga berhasil ditambahkan.',
            'data' => $reminder
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $reminder = ExerciseReminder::where('user_id', Auth::id())->find($id);

        if (!$reminder) {
            return response()->json(['message' => 'Pengingat tidak ditemukan.'], 404);
        }

        $validated = $request->validate([
            'exercise_type' => 'required|string|max:255',
            'scheduled_time' => 'required|date_format:H:i',
            'duration_minutes' => 'required|integer',
            'video_url' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $reminder->update($validated);

        return response()->json([
            'message' => 'Pengingat olahraga berhasil diperbarui.',
            'data' => $reminder
        ]);
    }

    public function destroy($id)
    {
        $reminder = ExerciseReminder::where('user_id', Auth::id())->find($id);

        if (!$reminder) {
            return response()->json(['message' => 'Pengingat tidak ditemukan.'], 404);
        }

        $reminder->delete();

        return response()->json(['message' => 'Pengingat olahraga berhasil dihapus.']);
    }
}
