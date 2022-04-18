@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">{{ $suite->name }} ({{ $hotel->name }}, {{ $hotel->city }})</h3>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($suite->images as $image)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $image->storage_path) }}"/>
                </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- End Swiper -->

    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $suite->description }}</p>
        </div>
        <div class="card-body">
            <a href="{{ route("addBooking") }}?hotel={{ $suite->hotel->id }}&suite={{ $suite->id }}"
               class="btn btn-success m-2">Réserver</a>
            <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-primary m-2">Voir les autres suites</a>
            <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-outline-primary m-2">Booking.com</a>
        </div>
    </div>

@endsection
