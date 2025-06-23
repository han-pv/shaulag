@extends('layouts.index')
@section('content')
    <div class="container-xl">
        <div class="display-4 fw-bold">
            Home
        </div>
        <div class="text-warning h3 mt-3">
            Brands
        </div>
        @foreach($brandModels as $brandModel)
            <div class="h4 fw-bold text-primary">{{ $brandModel->brand->name }}</div>
            <div class="h5 fw-bold text-danger">{{ $brandModel->name }}</div>
        @endforeach
        <div class="text-warning h3 mt-3">
            Locations
        </div>
        @foreach($locations as $location)
            <div class="h4 fw-bold text-primary">{{ $location->name }}</div>
        @endforeach
        <div class="text-warning h3 mt-3">
            Colors
        </div>
        @foreach($colors as $color)
            <div class="h4 fw-bold text-primary">{{ $color->name }}</div>
        @endforeach
    </div>
@endsection