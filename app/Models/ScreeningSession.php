<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScreeningSession extends Model
{
    //
    protected $fillable = ['user_id', 'score', 'risk_level', 'risk_description', 'next_step'];

    public function answers() {
        return $this->hasMany(ScreeningAnswer::class, 'session_id');
    }

    public static function evaluateRisk($score): array {
        if ($score >= 20) {
            return [
                'risk_level' => 'Tinggi',
                'risk_description' => 'Anda berisiko tinggi terhadap diabetes.',
                'next_step' => 'Konsultasikan ke dokter segera.'
            ];
        } elseif ($score >= 10) {
            return [
                'risk_level' => 'Sedang',
                'risk_description' => 'Anda memiliki risiko sedang.',
                'next_step' => 'Pantau pola makan dan gaya hidup.'
            ];
        }
        return [
            'risk_level' => 'Rendah',
            'risk_description' => 'Risiko diabetes rendah.',
            'next_step' => 'Pertahankan pola hidup sehat.'
        ];
    }
}
