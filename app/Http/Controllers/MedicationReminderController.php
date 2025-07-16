<?php

namespace App\Http\Controllers;

use App\Models\MedicationReminder;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MedicationReminderController extends Controller
{
    public function index()
    {
        return MedicationReminder::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        try {
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
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal menyimpan pengingat obat.',
                'error' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $reminder = MedicationReminder::where('user_id', Auth::id())->findOrFail($id);

            $validated = $request->validate([
                'medication_name' => 'required|string|max:255',
                'dosage' => 'required|string|max:50',
                'time' => 'required|date_format:H:i',
                'type' => 'required|in:insulin,oral',
                'notes' => 'nullable|string'
            ]);

            $reminder->update($validated);

            return response()->json([
                'message' => 'Pengingat berhasil diperbarui.',
                'data' => $reminder
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Pengingat tidak ditemukan atau bukan milik pengguna.'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function destroy($id)
    {
        $reminder = MedicationReminder::where('user_id', Auth::id())->findOrFail($id);
        $reminder->delete();

        return response()->json(['message' => 'Pengingat berhasil dihapus.']);
    }
}
