@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1 class="welcome border-bottom pb-2 mb-4">Bienvenue sur le groupe hôtelier Hypnos</h1>
        <br>
        <h5>Nous vous proposons {{ $hotels->count() }} établissements répartis sur toute la France. Chaque hôtel vous offrira un large choix de suites plus luxueuses les unes que les autres afin de rendre votre séjour inoubliable. <br>
        <br>
            Découvrez vite nos établissements ainsi que les prestations haut de gamme qui vous attendent.
            <br>
            <br>
            Laissez-vous séduire par l'une des {{ $suites->count() }} suites au style raffiné, chic & romantique.
        </h5>
    </div>

    <div class="row">
        @if($hotels->count() > 1)
            @foreach($hotels as $hotel)
                <div class="col-md-3 d-flex justify-content-center mb-2">

                    <div class="card">
                        <img src="{{ asset('storage/coverHotel/' .  $hotel->image_path) }}" class="card-img-top"
                             alt="photo cover de l'hôtel">
                        <div class="card-body welcome">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <p class="card-text">{{ $hotel->city }}</p>
                            <a href="{{ route('suites', ['hotel' => $hotel]) }}"
                               class="btn btn-outline-dark btn-welcome">Découvrir
                                les
                                suites</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h4 class="border-bottom pb-2 mb-4">Tous les hôtels de notre groupe Hypnos sont en maintenance. Nous
                    nous excusons pour la gêne occasionnée.</h4>
            </div>
        @endif
    </div>
@endsection
