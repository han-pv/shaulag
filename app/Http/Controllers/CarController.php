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
            'brandModel' => ['nullable', 'integer', 'min:1'],
            'year' => ['nullable', 'array', 'min:0'],
            'year.*' => ['nullable', 'integer', 'min:1'],
            'color' => ['nullable', 'array', 'min:0'],   // ['1']
            'color.*' => ['nullable', 'integer', 'min:1'],
            'minPrice' => ['nullable', 'numeric', 'min:1'],
            'maxPrice' => ['nullable', 'numeric', 'min:1'],
            'exchange' => ['nullable', 'boolean'],
            'credit' => ['nullable', 'boolean'],
        ]);

        $f_location = $request->has('location') ? $request->location : null;
        $f_brand = $request->has('brand') ? $request->brand : null;
        $f_brand_model = $request->has('brandModel') ? $request->brandModel : null;
        $f_year = $request->has('year') ? $request->year : [];
        $f_color = $request->has('color') ? $request->color : [];
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : 0;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : 0;
        $f_exchange = $request->has('exchange') ? $request->exchange : 0;
        $f_credit = $request->has('credit') ? $request->credit : 0;

        $cars = Car::when(isset($f_location), function ($query) use ($f_location) {
            return $query->where('location_id', $f_location);
        })
        ->when(isset($f_brand), function ($query) use ($f_brand) {
            return $query->where('brand_id', $f_brand);
        })
        ->when(isset($f_brand_model), function ($query) use ($f_brand_model) {
            return $query->where('brand_model_id', $f_brand_model);
        })
        ->when(count($f_color) > 0, function ($query) use ($f_color) {
            return $query->whereIn('color_id', $f_color);
        })
        ->when(count($f_year) > 0, function ($query) use ($f_year) {
            return $query->whereIn('year_id', $f_year);
        })
        ->when( $f_minPrice > 0, function ($query) use ($f_minPrice) {
            return $query->where('price', ">=",$f_minPrice);
        })
        ->when( $f_maxPrice > 0, function ($query) use ($f_maxPrice) {
            return $query->where('price', "<=",$f_maxPrice);
        })
        ->when($f_exchange == 1, function ($query)  {
            return $query->where('exchange', 1);
        })
        ->when($f_credit == 1, function ($query)  {
            return $query->where('credit', 1);
        })
        ->orderBy('id', 'desc')
        ->paginate(60)
        ->withQueryString();

        $locations = Location::withCount('cars')-> get();

        $colors = Color::withCount('cars')
        ->orderBy('name')
        ->get();

        $years = Year::withCount('cars')
        ->orderBy('name', 'desc')
        ->get();

        $brands = Brand::with('brandModels')
        ->withCount('cars')
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
                'f_brand_model' => $f_brand_model,
                'f_color' => $f_color,
                'f_year' => $f_year,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                'f_exchange' => $f_exchange,
                'f_credit' => $f_credit,
            ]
        );
    }
}
