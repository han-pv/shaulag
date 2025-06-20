<?php

namespace Database\Factories;

use App\Models\Year;
use App\Models\Color;
use App\Models\Location;
use App\Models\BrandModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{

    public function definition(): array
    {
        $location = Location::inRandomOrder()->first();
        $color = Color::inRandomOrder()->first();
        $brandModel = BrandModel::with('brand')->inRandomOrder()->first();
        $year = Year::inRandomOrder()->first();
        return [
            'brand_id' => $brandModel->brand_id,
            'brand_model_id' => $brandModel->id,
            'color_id' => $color->id,
            'location_id' => $location->id,
            'year_id' => $year->id,
            'title' => $brandModel->brand->name . ' ' . $brandModel->name . ' ' . $year->name,
            'description' => fake()->paragraph(rand(2, 8)),
            'image' => null,
            'price' => fake()->numberBetween(30000, 1000000),
            'exchange' => fake()->boolean(30),
            'credit' => fake()->boolean(30),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
