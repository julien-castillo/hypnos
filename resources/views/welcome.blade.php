@extends("layouts.master")

@section("home-title")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="welcome border-bottom pb-2 mb-4">Bienvenue sur le groupe hôtelier Hypnos</h3>
    </div>
@endsection

@section("cards-hotel")

    <div class="row">
        @foreach($hotels as $hotel)

            <div class="col-md-3 d-flex justify-content-center mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <p class="card-text">{{ $hotel->city }}</p>
                        <p class="card-text">{{ $hotel->address }}</p>
                        <p class="card-text">{{ $hotel->description }}</p>
                        <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-outline-light">Découvrir les
                            suites</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
