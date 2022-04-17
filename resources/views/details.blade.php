@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Détails de la suite : {{ $suite->name }}  ({{ $hotel->name }})</h3>
    </div>
{{--Test Swiper--}}
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($suite->images as $image)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $image->storage_path) }}" />
            </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>



{{--    Fin test Swiper--}}



    {{--        Test carousel--}}
{{--    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">--}}
{{--        <div class="carousel-inner">--}}
{{--            <div class="carousel-item active">--}}
{{--                <img src="{{ asset('storage/' . $suite->cover) }}" class="img-fluid w-100" alt="...">--}}
{{--            </div>--}}

{{--            @foreach($suite->images as $image)--}}
{{--                <div class="carousel-item">--}}
{{--                    <img src="{{ asset('storage/' . $image->storage_path) }}" class="d-block w-100"--}}
{{--                         alt="Photo de la suite">--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">--}}
{{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Previous</span>--}}
{{--        </button>--}}
{{--        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">--}}
{{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Next</span>--}}
{{--        </button>--}}
{{--    </div>--}}
    {{--        Fin test carousel--}}


    <div class="card">
{{--        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">--}}

{{--            <div class="carousel-inner">--}}
{{--                <div class="carousel-item active">--}}
{{--                    <img src="{{ asset('storage/' . $suite->cover) }}" class="d-block w-100"--}}
{{--                         alt="Photo cover de la suite">--}}
{{--                </div>--}}
{{--                @foreach($suite->images as $image)--}}
{{--                    <div class="carousel-item">--}}
{{--                        <img src="{{ asset('storage/' . $image->storage_path) }}" class="d-block w-100"--}}
{{--                             alt="Photo de la suite">--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"--}}
{{--                    data-bs-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="visually-hidden">Previous</span>--}}
{{--            </button>--}}
{{--            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"--}}
{{--                    data-bs-slide="next">--}}
{{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                <span class="visually-hidden">Next</span>--}}
{{--            </button>--}}

{{--        </div>--}}
        {{--        <img src="..." class="card-img-top" alt="...">--}}
        <div class="card-body">
{{--            <h5 class="card-title">{{ $suite->name }}</h5>--}}
            <p class="card-text">{{ $suite->description }}</p>
        </div>
        <div class="card-body">
            <a href="{{ route("addBooking") }}?hotel={{ $suite->hotel->id }}&suite={{ $suite->id }}"
               class="btn btn-success m-2">Réserver</a>
            <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-primary m-2">Voir les autres suites</a>
            <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-outline-primary m-2">Booking.com</a>
        </div>
    </div>



    @include("layouts.footer")
@endsection
