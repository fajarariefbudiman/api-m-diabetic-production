<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $birthDate = Carbon::parse($data['birth_date']);
        $age = $birthDate->age;

        $bmi = isset($data['height'], $data['weight']) && $data['height'] > 0
            ? round($data['weight'] / pow($data['height'] / 100, 2), 2)
            : null;

        $user = User::create([
            'name'             => $data['fullname'],
            'email'            => $data['email'],
            'phone_number'     => $data['phone_number'],
            'password'         => Hash::make($data['password']),
            'birth_date'       => $data['birth_date'],
            'age'              => $age,
            'role'             => $data['role'] ?? 'user',
            'gender'           => $data['gender'],
            'family_history'   => $data['family_history'],
            'height'           => $data['height'],
            'weight'           => $data['weight'],
            'bmi'              => $bmi,
        ]);

        return response()->json([
            'id'             => $user->id,
            'fullname'       => $user->name,
            'email'          => $user->email,
            'phone_number'   => $user->phone_number,
            'birth_date'     => $user->birth_date,
            'age'            => $user->age,
            'role'           => $user->role,
            'gender'         => $user->gender,
            'family_history' => $user->family_history,
            'height'         => $user->height,
            'weight'         => $user->weight,
            'bmi'            => $user->bmi,
            'created_at'     => $user->created_at->toISOString(),
            'updated_at'     => $user->updated_at->toISOString(),
        ], 201);
    }
}
