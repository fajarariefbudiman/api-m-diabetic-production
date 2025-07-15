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
        $user = Auth::user();
        if ($user instanceof \Illuminate\Database\Eloquent\Collection) {
            $user = $user->first();
        }
        $user->update($request->validated());

        return response()->json(new UserResource($user->fresh()), 200);
    }
}
