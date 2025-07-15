<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'phone_number' => $this->phone_number,
            'role' => $this->role,
            'family_history' => $this->family_history,
            'height' => $this->height,
            'weight' => $this->weight,
            'bmi' => $this->bmi,
            'diabetes_type' => $this->diabetes_type,
            'glucose_level' => $this->glucose_level,
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString()
        ];
    }
}
