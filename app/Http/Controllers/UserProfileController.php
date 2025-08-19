<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    //
    public function show()
    {
        return response()->json(new UserResource(Auth::user()));
    }

    public function update(UserProfileUpdateRequest $request)
    {
        try {
            $user = Auth::user();
            if ($user instanceof \Illuminate\Database\Eloquent\Collection) {
                $user = $user->first();
            }

            if (!$user) {
                return response()->json([
                    'message' => 'Pengguna tidak ditemukan.'
                ], 404);
            }

            $updated = $user->update($request->validated());

	    if (array_key_exists('glucose_level', $data)) {
               if ($data['glucose_level'] != $user->glucose_level) {
                   $data['glucose_level_updated_at'] = now();
               }
            }

            if (!$updated) {
                return response()->json([
                    'message' => 'Gagal memperbarui profil pengguna.'
                ], 500);
            }

            return response()->json(new UserResource($user->fresh()), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui profil.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
