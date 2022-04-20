@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Découvrez les suites de luxe de l'hôtel : {{ $hotel->name }}</h3>
        <h5>{{ $hotel->address }} {{ $hotel->city }}</h5>
    </div>
    @if(isset($hotel->description))
        <div class="card description">
            <div class="card-body">
                <p class="card-text">{{ $hotel->description }}</p>
            </div>
            <div class="card-body"></div>
        </div>
    @endif

    <div class="row">
        @if($suites->count() > 0)
            @foreach($suites as $suite)
                <div class="col-md-3 d-flex justify-content-center mb-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $suite->cover) }}" class="card-img-top"
                             alt="Photo cover de la suite">
                        <div class="card-body suites">
                            <h5 class="card-title">{{ $suite->name }}</h5>
                            <h5 class="card-title">{{ $suite->price . ' ' . '€' }}</h5>
                            <a href="{{ route('details',['hotel' => $hotel, 'suite' => $suite]) }}"
                               class="btn btn-primary">Détails
                                de la suite</a>
                            <a href="{{ route("addBooking") }}?hotel={{ $suite->hotel->id }}&suite={{ $suite->id }}"
                               class="btn btn-success">Réserver</a>
                            <a href="http://www.booking.com" target="_blank" class="btn btn-outline-primary m-2">Booking.com</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h4 class="border-bottom pb-2 mb-4">Toutes les suites de cet hôtel sont en travaux, nous vous présentons
                    nos excuses.</h4>
            </div>
        @endif
    </div>

@endsection
