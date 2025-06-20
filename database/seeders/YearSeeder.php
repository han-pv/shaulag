<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearSeeder extends Seeder
{
    public function run(): void
    {
        $objs = [
            '2020',
            '2021',
            '2022',
            '2023',
            '2024',
            '2025',
        ];

        foreach($objs as $obj) {
            Year::create([
                'name' => $obj,
            ]);
        }
    }
}
