@extends("layouts.master")

@section("details-title")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Détails de la suite : {{ $suite->name }}</h3>
    </div>
@endsection

@section("cards-details")
    <div class="card" style="width: 80%;">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/H1-S1-1.jpg') }}" class="d-block w-100" alt="..." >
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/H1-S1-2.jpg') }}" class="d-block w-100" alt="..." >


                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
{{--        <img src="..." class="card-img-top" alt="...">--}}
        <div class="card-body">
            <h5 class="card-title">{{ $suite->name }}</h5>
            <p class="card-text">{{ $suite->description }}</p>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-success m-2">Réserver</a>
            <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-primary m-2">Voir les autres suites</a>
        </div>
    </div>


        </div>
    </div>

@endsection
