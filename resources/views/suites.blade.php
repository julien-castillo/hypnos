@extends("layouts.master")

@section("suites-title")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Découvrez les suites de luxe de l'hôtel : {{ $hotel->name }}</h3>
    </div>
@endsection

@section("cards-suites")
    @foreach($suites as $suite)
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $suite->name }}</h5>
                <p class="card-text">{{ $suite->description }}</p>
                            <a href="{{ route('details',['hotel' => $hotel, 'suite' => $suite]) }}" class="btn btn-primary">Détails de la suite</a>
                <a href="#" class="btn btn-success">Réserver</a>
            </div>
        </div>

    @endforeach


@endsection
