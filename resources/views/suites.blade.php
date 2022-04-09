@extends("layouts.master")

@section("suites-title")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Découvrez les suites de luxe de l'hôtel : {{ $hotel->name }}</h3>
    </div>
@endsection

@section("cards-suites")
    <div class="row">
        @if($suites->count() > 1)
        @foreach($suites as $suite)
            <div class="col-md-3 d-flex justify-content-center mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="/cover/{{ $suite->cover }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $suite->name }}</h5>
                        <p class="card-text">{{ $suite->description }}</p>
                        <a href="{{ route('details',['hotel' => $hotel, 'suite' => $suite]) }}" class="btn btn-primary">Détails
                            de la suite</a>
                        <a href="#" class="btn btn-success">Réserver</a>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h4 class="border-bottom pb-2 mb-4">Toutes les suites de cet hôtel sont en travaux, nous vous présentons nos excuses.</h4>
            </div>
            @endif
    </div>


@endsection
