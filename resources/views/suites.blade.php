@extends("layouts.master")

@section("suites-title")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Découvrez les suites de luxe de notre hôtel</h3>
    </div>
@endsection

@section("cards-suites")
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Suite n°1</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{ route('details') }}" class="btn btn-primary">Détails de la suite</a>
            <a href="#" class="btn btn-success">Réserver</a>
        </div>
    </div>

@endsection
