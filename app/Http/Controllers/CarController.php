<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Location;
use App\Models\Year;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'location' => ['nullable', 'integer', 'min:1'],
            'brand' => ['nullable', 'integer', 'min:1'],
            'year' => ['nullable', 'integer', 'min:1'],
            'color' => ['nullable', 'integer', 'min:1'],
        ]);

        $f_location = $request->has('location') ? $request->location : null;
        $f_brand = $request->has('brand') ? $request->brand : null;
        $f_color = $request->has('color') ? $request->color : null;
        $f_year = $request->has('year') ? $request->year : null;

        $cars = Car::when(isset($f_location), function ($query) use ($f_location) {
            return $query->where('location_id', $f_location);
        })
        ->when(isset($f_brand), function ($query) use ($f_brand) {
            return $query->where('brand_id', $f_brand);
        })
        ->when(isset($f_color), function ($query) use ($f_color) {
            return $query->where('color_id', $f_color);
        })
        ->when(isset($f_year), function ($query) use ($f_year) {
            return $query->where('year_id', $f_year);
        })
        ->orderBy('id', 'desc')
        ->paginate(100)
        ->withQueryString();

        $locations = Location::get();

        $colors = Color::orderBy('name')
        ->get();

        $years = Year::orderBy('name', 'desc')
        ->get();

        $brands = Brand::with('brandModels')
        ->orderBy('name')
        ->get();
        
        return view('cars.index')->with(
            [
                'cars' => $cars,
                'locations' => $locations,
                'brands' => $brands,
                'colors' => $colors,
                'years' => $years,
                'f_location' => $f_location,
                'f_brand' => $f_brand,
                'f_color' => $f_color,
                'f_year' => $f_year,
            ]
        );
    }
}
