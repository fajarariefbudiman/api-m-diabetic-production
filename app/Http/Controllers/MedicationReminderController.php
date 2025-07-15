<?php

namespace App\Http\Controllers;

use App\Models\MedicationReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicationReminderController extends Controller
{
    public function index()
    {
        return MedicationReminder::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:50',
            'time' => 'required|date_format:H:i',
            'type' => 'required|in:insulin,oral',
            'notes' => 'nullable|string'
        ]);

        $validated['user_id'] = Auth::id();

        $reminder = MedicationReminder::create($validated);

        return response()->json($reminder, 201);
    }

    public function update(Request $request, $id)
    {
        $reminder = MedicationReminder::where('user_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:50',
            'time' => 'required|date_format:H:i',
            'type' => 'required|in:insulin,oral',
            'notes' => 'nullable|string'
        ]);

        $reminder->update($validated);

        return response()->json($reminder);
    }

    public function destroy($id)
    {
        $reminder = MedicationReminder::where('user_id', Auth::id())->findOrFail($id);
        $reminder->delete();

        return response()->json(['message' => 'Pengingat berhasil dihapus.']);
    }
}
