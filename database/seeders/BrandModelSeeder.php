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
                'logo' => 'bmw.png',
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
                'logo' => 'mercedes-benz.png',
                'models' => [
                    'S-class',
                    'E-class',
                    'G-class',
                    'CLA 45',
                ]
            ],

            [
                'name' => 'Toyota',
                'logo' => 'toyota.png',
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
                'logo' => 'lexus.png',
                'models' => [
                    'LX',
                    'RX',
                    'ES',
                    'TX',
                ]
            ],

            [
                'name' => 'Hyundai',
                'logo' => 'hyundai.png',
                'models' => [
                    'Sonata',
                    'Azera',
                    'Elantra',
                    'Tucson',
                ]
            ],

            [
                'name' => 'Nissan',
                'logo' => null,
                'models' => [
                    'Pathfinder',
                    'Altima',
                ]
            ],

        ];

        foreach ($objs as $obj) {
            $brand = Brand::create([
                'name' => $obj['name'],
                'logo' => $obj['logo'],
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
