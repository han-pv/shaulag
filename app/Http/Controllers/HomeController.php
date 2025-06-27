<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Color;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('cars')->get();
        $locations = Location::withCount('cars')->get();
        $colors = Color::all();
        
        return view('home.index')->with(
            [
                'brands' => $brands,
                'locations' => $locations,
                'colors' => $colors,
            ]
        );
    }
}
