@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="display-4 fw-bold mb-2">
            Cars
        </div>

        <div class="row justify-content-between">
            <div class="col-3">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title:</label>
                        <input type="text" class="form-control">
                        <div id="title" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Brand:</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Model:</label>
                        <input type="text" class="form-control">
                        <div id="title" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Location:</label>
                        <input type="text" class="form-control">
                        <div id="title" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Year:</label>
                        <input type="text" class="form-control">
                        <div id="title" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Color:</label>
                        <input type="text" class="form-control">
                        <div id="title" class="form-text"></div>
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
                    <button type="reset" class="btn btn-secondary"><i class="bi bi-x"></i> Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-9">
                <div class="row row-cols-3 gy-3">
                    @foreach ($cars as $car)
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
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection