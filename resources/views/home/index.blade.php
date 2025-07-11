@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="display-6 fw-bold">
            Home
        </div>
        <div class="my-3">
            <img src="{{ asset('img/banners/banner.jpg') }}" class="img-fluid rounded-3" alt="">
        </div>
        <div class="text-primary h3 mt-3">
            Brands
        </div>
        <div class="row row-cols-6 gx-3">
            @foreach($brands as $brand)
                <div class="col">
                    <div class="card bg-white text-center border border-1 rounded-2 h-100 p-2">
                        <img src="{{ asset('img/brands/' . $brand->logo) }}" class="img-fluid w-25 mx-auto" alt="">
                        <a href="{{ route('cars', ['brand' => $brand->id]) }}"
                            class="d-block text-decoration-none stretched-link h5 fw-bold text-dark mt-2">{{ $brand->name }}
                            <span class="fw-light small text-secondary ms-2">{{ $brand->cars_count }}</span></a>

                    </div>
                </div>
            @endforeach
        </div>


        <div class="text-primary h3 mt-4">
            Locations
        </div>
        <div class="row row-cols-7 gx-3 mb-5">

            @foreach($locations as $location)
                <div class="col">
                    <div class="bg-white text-center border border-1 rounded-2 h-100 p-2">
                        <a href="{{ route('cars', ['location' => $location->id]) }}" class="text-decoration-none h5 fw-bold text-dark mt-2 py-3">{{ $location->name }} <span
                                class="text-secondary fw-light ms-2">{{ $location->cars_count }}</span>
                        </a>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection