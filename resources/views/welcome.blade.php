@extends("layouts.master")

@section("home-title")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Bienvenue sur le groupe hôtelier Hypnos</h3>
    </div>
@endsection

@section("cards-hotel")
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Hôtel n°1</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{ route('suites') }}" class="btn btn-primary">Découvrir les suites</a>
        </div>
    </div>

@endsection
