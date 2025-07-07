@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="display-6 fw-bold mb-2">
            Cars {{ $cars->total() }}
        </div>

        <div class="row justify-content-between">
            <div class="col-3">
                <form action="{{ route('cars') }}" method="get" class="mb-5">
                    <div class="mb-3">
                        <label for="q" class="form-label">Search:</label>
                        <input type="text" id="q" name="q" value="{{ $f_q ? $f_q : '' }}" class="form-control"
                            placeholder="Toyota Corolla">
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand:</label>
                        <select id="brand" name="brand" class="form-select">
                            <option value="">-</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $f_brand ? 'selected' : '' }}>{{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="brandModel" class="form-label">Brand Model:</label>
                        <select id="brandModel" name="brandModel" class="form-select">
                            <option value="">-</option>
                            @foreach ($brands as $brand)
                                @foreach ($brand->brandModels as $brandModel)
                                    <option value="{{ $brandModel->id }}" {{ $brandModel->id == $f_brand_model ? 'selected' : '' }}>
                                        {{ $brand->name . ' / ' . $brandModel->name }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location:</label>
                        <select id="location" name="location" class="form-select">
                            <option value="">-</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $location->id == $f_location ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year:</label>
                        <select id="year" name="year[]" class="form-select" multiple>
                            <option value="">-</option>
                            @foreach ($years as $year)
                                <option value="{{ $year->id }}" {{ $year->id == $f_year ? 'selected' : '' }}>{{ $year->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color:</label>
                        <select id="color" name="color[]" class="form-select" multiple>
                            <option value="">-</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}" {{ $color->id == $f_color ? 'selected' : '' }}>{{ $color->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price:</label>
                        <div class="d-flex">
                            <div class="me-2">
                                Min:
                                <input type="text" name="minPrice" value="{{ $f_minPrice > 0 ? $f_minPrice : " " }}"
                                    class="form-control">
                            </div>
                            <div>
                                Max:
                                <input type="text" name="maxPrice" value="{{ $f_maxPrice > 0 ? $f_maxPrice : " " }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div id="title" class="form-text"></div>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" name="exchange" value="1" type="checkbox" role="switch"
                            id="exchange" {{ $f_exchange ? 'checked' : '' }}>
                        <label class="form-check-label" for="exchange">Exchange</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" name="credit" value="1" type="checkbox" role="switch" id="credit" {{ $f_credit ? 'checked' : '' }}>
                        <label class="form-check-label" for="credit">Credit</label>
                    </div>
                    <a href="{{ route('cars') }}" class="btn btn-secondary"><i class="bi bi-x"></i> Reset</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-9">
                <div class="row row-cols-3 gy-3">
                    @forelse ($cars as $car)
                        <div class="col">
                            <div class="position-relative border rounded-3 h-100 my-2 py-2 px-3">
                                <div>
                                    <img src="{{ asset('img/cars/' . $car->brand->name . '.png') }}" class="img-fluid opacity-50 rounded-3" style="height: 200px;" alt="{{ $car->brand->name }}">
                                </div>
                                <div class="">
                                    <div class="h5 fw-bold text-primary ">{{ $car->title }}</div>
                                    <div class="h6 fw-bold">{{ number_format($car->price, 0, ',', ' ') }} TMT</div>
                                    <div class="d-flex mb-2">
                                        <div class="">
                                            <i class="bi bi-geo-alt"></i> <span
                                                class="text-secondary">{{ $car->location->name }}</span>
                                        </div>
                                        <div class="mx-3">
                                            <i class="bi bi-calendar"></i> <span
                                                class="text-secondary">{{ $car->year->name }}</span>
                                        </div>
                                        <div>
                                            <i class="bi bi-palette2"></i> <span
                                                class="text-secondary">{{ $car->color->name }}</span>
                                        </div>

                                    </div>
                                    <div class="d-flex mb-2">
                                        <div class="">
                                            Exchange: <i
                                                class="bi bi-{{ $car->exchange ? 'check-lg text-success' : 'x-lg text-danger' }}"></i>
                                        </div>
                                        <div class="ms-4">
                                            Credit: <i
                                                class="bi bi-{{ $car->credit ? 'check-lg text-success' : 'x-lg text-danger' }}"></i>
                                        </div>
                                    </div>
                                    <div class="fst-italic mb-2">
                                        {{ Str::limit($car->description, 75)}}
                                    </div>
                                    <div class="position-absolute end-0 bottom-0 small text-secondary fw-light fst-italic m-3">
                                        <i class="bi bi-clock"></i> {{ date_format($car->created_at, "m.d.Y")  }}
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