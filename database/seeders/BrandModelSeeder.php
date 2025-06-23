<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            [
                'name' => 'BMW',
                'models' => [
                    'X6',
                    'X5',
                    'E60',
                    'M3',
                    'M4',
                    'F10',
                    'F90'
                ]
            ],

            [
                'name' => 'Mercedes-Benz',
                'models' => [
                    'S-class',
                    'E-class',
                    'G-class',
                    'CLA 45',
                ]
            ],

            [
                'name' => 'Toyota',
                'models' => [
                    'Camry',
                    'Avolon',
                    'Corolla',
                    'Crown',
                    'Highlander',
                    'Prado',
                    'Sienna',
                ]
            ],

            [
                'name' => 'Lexus',
                'models' => [
                    'LX',
                    'RX',
                    'ES',
                    'TX',
                ]
            ],

            [
                'name' => 'Hyundai',
                'models' => [
                    'Sonata',
                    'Azera',
                    'Elantra',
                    'Tucson',
                ]
            ],

            [
                'name' => 'Nissan',
                'models' => [
                    'Pathfinder',
                    'Altima',
                ]
            ],

        ];

        foreach ($objs as $obj) {
            $brand = Brand::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $model) {
                BrandModel::create([
                    'brand_id' => $brand->id,
                    'name' => $model,
                ]);
            }
        }
    }
}
