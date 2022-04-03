@extends("layouts.master")

@section("home-title")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Bienvenue sur le groupe hôtelier Hypnos</h3>
    </div>
@endsection

@section("cards-hotel")

    @foreach($hotels as $hotel)
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $hotel->name }}</h5>
                <p class="card-text">{{ $hotel->ville }}</p>
                <p class="card-text">{{ $hotel->description }}</p>
                <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-primary">Découvrir les suites</a>
            </div>
        </div>

    @endforeach


@endsection
