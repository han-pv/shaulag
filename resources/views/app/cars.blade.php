<div class="row row-cols-3 gy-3">
    @forelse ($cars as $car)
        <div class="col">
            <div class="border rounded-3 h-100 my-2 py-2 px-3">
                <div>
                    <img src="./" alt="">
                </div>
                <div class="">
                    <div class="h5 fw-bold text-primary ">{{ $car->title }}</div>
                    <div class="h6 fw-bold">{{ number_format($car->price, 0, ',', ' ') }} TMT</div>
                    <div class="d-flex mb-2">
                        <div class="">
                            <i class="bi bi-geo-alt"></i> <span
                                class="text-secondary {{ isset($f_location) ? 'mark' : '' }}">{{ $car->location->name }}</span>
                        </div>
                        <div class="mx-3">
                            <i class="bi bi-calendar"></i> <span
                                class="text-secondary {{ $f_year == $year->id ? 'mark' : '' }}">{{ $car->year->name }}</span>
                        </div>
                        <div>
                            <i class="bi bi-palette2"></i> <span
                                class="text-secondary {{ $f_color == $color->id ? 'mark' : '' }}">{{ $car->color->name }}</span>
                        </div>

                    </div>
                    <div class="d-flex mb-2">
                        <div>
                            Exchange: <i
                                class="bi bi-{{ $car->exchange ? 'check-lg text-success' : 'x-lg text-danger' }}"></i>
                        </div>
                        <div class="ms-4">
                            Credit: <i class="bi bi-{{ $car->credit ? 'check-lg text-success' : 'x-lg text-danger' }}"></i>
                        </div>
                    </div>
                    <div class="fst-italic mb-2">
                        {{ Str::limit($car->description, 75)}}
                    </div>
                    <div class="text-end small text-secondary fw-light fst-italic">
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