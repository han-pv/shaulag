@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="display-4 fw-bold mb-2">
            Cars
        </div>

        <div class="row justify-content-between">
            <div class="col-3">
                <form action="{{ route('cars') }}" method="get">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title:</label>
                        <input type="text" class="form-control">
                        <div id="title" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand:</label>
                        <select id="brand" name="brand" class="form-select">
                            <option value="">-</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location:</label>
                        <select id="location" name="location" class="form-select">
                            <option value="">-</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year:</label>
                        <select id="year" name="year" class="form-select">
                            <option value="">-</option>
                            @foreach ($years as $year)
                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color:</label>
                        <select id="color" name="color" class="form-select">
                            <option value="">-</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price:</label>
                        <div class="d-flex">
                            <div class="me-2">
                                Min:
                                <input type="text" class="form-control">
                            </div>
                            <div>
                                Max:
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div id="title" class="form-text"></div>
                    </div>
                    <a href="{{ route('cars') }}" class="btn btn-secondary"><i class="bi bi-x"></i> Reset</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-9">
                <div class="row row-cols-3 gy-3">
                    @forelse ($cars as $car)
                        <div class="col">
                            <div class="border rounded-3 h-100 my-2 py-2 px-3">
                                <div>
                                    <img src="./" alt="">
                                </div>
                                <div class="">
                                    <div class="h5 fw-bold text-primary ">{{ $car->title }}</div>
                                    <div class="h6 fw-bold">{{ $car->price }} TMT</div>
                                    <div class="d-flex mb-2">
                                        <div class="">
                                            <i class="bi bi-geo-alt"></i> <span
                                                class="text-secondary {{ isset($f_location) ? 'mark' : '' }}">{{ $car->location->name }}</span>
                                        </div>
                                        <div class="mx-3">
                                            <i class="bi bi-calendar"></i> <span
                                                class="text-secondary {{ isset($f_year) ? 'mark' : '' }}">{{ $car->year->name }}</span>
                                        </div>
                                        <div>
                                            <i class="bi bi-palette2"></i> <span
                                                class="text-secondary">{{ $car->color->name }}</span>
                                        </div>

                                    </div>
                                    <div class="d-flex">
                                        <div>
                                            Exchange: <i
                                                class="bi bi-{{ $car->exchange ? 'check-lg text-success' : 'x-lg text-danger' }}"></i>
                                        </div>
                                        <div class="ms-4">
                                            Credit: <i
                                                class="bi bi-{{ $car->credit ? 'check-lg text-success' : 'x-lg text-danger' }}"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="col-12">
                            <div class="display-4 text-center fw-semibold">
                                Car not found
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="my-5">
                    {{ $cars->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection