<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $foods = [
            [
                'name' => 'Pisang Goreng',
                'brand' => null,
                'carbs' => 18,
                'sugar' => 8,
                'calories' => 70,
                'protein' => 1,
                'fat' => 3,
                'category' => 'gorengan',
            ],
            [
                'name' => 'Gorengan Tempe',
                'brand' => null,
                'carbs' => 12,
                'sugar' => 0.5,
                'calories' => 35,
                'protein' => 3,
                'fat' => 2,
                'category' => 'gorengan',
            ],
            [
                'name' => 'Risoles Tahu Isi Pisang',
                'brand' => null,
                'carbs' => 15,
                'sugar' => 2,
                'calories' => 100,
                'protein' => 2,
                'fat' => 5,
                'category' => 'gorengan',
            ],
            [
                'name' => 'Bakwan Sayur',
                'brand' => null,
                'carbs' => 14,
                'sugar' => 1,
                'calories' => 137,
                'protein' => 2,
                'fat' => 6,
                'category' => 'gorengan',
            ],
            [
                'name' => 'Sotong Panjang (Gorengan)',
                'brand' => 'Beeru',
                'carbs' => 20,
                'sugar' => 2,
                'calories' => 320,
                'protein' => 8,
                'fat' => 25,
                'category' => 'camilan',
            ],
            [
                'name' => 'Tempe Bacem',
                'brand' => null,
                'carbs' => 10,
                'sugar' => 4,
                'calories' => 110,
                'protein' => 4,
                'fat' => 5,
                'category' => 'protein',
            ],
            [
                'name' => 'Sate Ayam',
                'brand' => null,
                'carbs' => 7,
                'sugar' => 2,
                'calories' => 150,
                'protein' => 12,
                'fat' => 8,
                'category' => 'protein',
            ],
            [
                'name' => 'Nasi Putih',
                'brand' => null,
                'carbs' => 40,
                'sugar' => 0,
                'calories' => 175,
                'protein' => 3,
                'fat' => 0.5,
                'category' => 'karbohidrat',
            ],
            [
                'name' => 'Nasi Goreng',
                'brand' => null,
                'carbs' => 45,
                'sugar' => 2,
                'calories' => 250,
                'protein' => 5,
                'fat' => 10,
                'category' => 'karbohidrat',
            ],
            [
                'name' => 'Mie Goreng Instan',
                'brand' => 'Indomie',
                'carbs' => 38,
                'sugar' => 3,
                'calories' => 380,
                'protein' => 7,
                'fat' => 16,
                'category' => 'karbohidrat',
            ],
            [
                'name' => 'Ayam Goreng',
                'brand' => null,
                'carbs' => 5,
                'sugar' => 0,
                'calories' => 220,
                'protein' => 18,
                'fat' => 15,
                'category' => 'protein',
            ],
            [
                'name' => 'Tahu Goreng',
                'brand' => null,
                'carbs' => 3,
                'sugar' => 0,
                'calories' => 70,
                'protein' => 4,
                'fat' => 5,
                'category' => 'protein',
            ],
            [
                'name' => 'Bakso Sapi',
                'brand' => null,
                'carbs' => 10,
                'sugar' => 1,
                'calories' => 150,
                'protein' => 10,
                'fat' => 6,
                'category' => 'protein',
            ],
            [
                'name' => 'Sayur Bayam',
                'brand' => null,
                'carbs' => 5,
                'sugar' => 1,
                'calories' => 35,
                'protein' => 2,
                'fat' => 0.5,
                'category' => 'sayur',
            ],
            [
                'name' => 'Sayur Asem',
                'brand' => null,
                'carbs' => 7,
                'sugar' => 2,
                'calories' => 40,
                'protein' => 2,
                'fat' => 0.5,
                'category' => 'sayur',
            ],
            [
                'name' => 'Gado-Gado',
                'brand' => null,
                'carbs' => 20,
                'sugar' => 5,
                'calories' => 200,
                'protein' => 6,
                'fat' => 12,
                'category' => 'sayur',
            ],
            [
                'name' => 'Kerupuk Udang',
                'brand' => null,
                'carbs' => 8,
                'sugar' => 0,
                'calories' => 50,
                'protein' => 1,
                'fat' => 3,
                'category' => 'camilan',
            ],
            [
                'name' => 'Martabak Manis',
                'brand' => null,
                'carbs' => 35,
                'sugar' => 20,
                'calories' => 300,
                'protein' => 5,
                'fat' => 15,
                'category' => 'dessert',
            ],
            [
                'name' => 'Es Teh Manis',
                'brand' => null,
                'carbs' => 25,
                'sugar' => 20,
                'calories' => 120,
                'protein' => 0,
                'fat' => 0,
                'category' => 'minuman',
            ],
            [
                'name' => 'Air Mineral',
                'brand' => 'Aqua',
                'carbs' => 0,
                'sugar' => 0,
                'calories' => 0,
                'protein' => 0,
                'fat' => 0,
                'category' => 'minuman',
            ],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
