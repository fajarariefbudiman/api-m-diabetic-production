<?php

namespace App\Http\Controllers;

use App\Models\WoundLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WoundCareController extends Controller
{
    public function guide()
    {
        return response()->json([
            ['title' => 'Cuci Tangan', 'description' => 'Pastikan mencuci tangan sebelum menyentuh luka.'],
            ['title' => 'Gunakan Sarung Tangan', 'description' => 'Jika tersedia, gunakan sarung tangan medis.'],
            ['title' => 'Bersihkan Luka', 'description' => 'Gunakan cairan antiseptik dan kasa steril.']
        ]);
    }

    public function tips()
    {
        return response()->json([
            ['tip' => 'Jaga luka tetap kering dan bersih.'],
            ['tip' => 'Ganti perban secara teratur.'],
            ['tip' => 'Hindari tekanan berlebih pada area luka.']
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'log_date' => 'required|date',
            'description' => 'required|string',
            'image_url' => 'nullable|string'
        ]);

        $log = WoundLog::create(array_merge(
            $validated,
            ['user_id' => Auth::id()]
        ));

        return response()->json($log, 201);
    }
}
