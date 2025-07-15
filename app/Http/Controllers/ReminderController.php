<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function index()
    {
        return Reminder::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $today = now();
        $day = $today->format('l');

        $exists = Reminder::where('user_id', $user->id)
            ->whereDate('created_at', $today)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Reminder hari ini sudah ada.'], 200);
        }

        Reminder::create([
            'user_id' => $user->id,
            'time' => '08:00:00',
            'day_of_week' => $day,
            'category' => 'anemia'
        ]);

        return response()->json(['message' => 'Reminder berhasil dibuat.'], 201);
    }
}
