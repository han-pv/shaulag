<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $objs = [
            'Arkadag',
            'Ashgabat',
            'Ahal',
            'Balkan',
            'Dashoguz',
            'Lebap',
            'Mary',
        ];

        foreach($objs as $obj) {
            Location::create([
                'name' => $obj,
            ]);
        }
    }
}
