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
        $brandModels = BrandModel::with('brand')->get();
        $locations = Location::all();
        $colors = Color::all();
        
        return view('home.index')->with(
            [
                'brandModels' => $brandModels,
                'locations' => $locations,
                'colors' => $colors,
            ]
        );
    }
}
