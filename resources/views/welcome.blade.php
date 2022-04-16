@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="welcome border-bottom pb-2 mb-4">Bienvenue sur le groupe hôtelier Hypnos</h3>
    </div>

    <div class="row">
        @if($hotels->count() > 1)
            @foreach($hotels as $hotel)

                <div class="col-md-3 d-flex justify-content-center mb-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/' .  $hotel->image_path) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <p class="card-text">{{ $hotel->city }}</p>
                            <p class="card-text">{{ $hotel->address }}</p>
                            <p class="card-text">{{ $hotel->description }}</p>
                            <a href="{{ route('suites', ['hotel' => $hotel]) }}" class="btn btn-outline-light">Découvrir
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


        <div class="b-example-divider"></div>

    <footer class="footer bg-body">
        <div class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 Company, Inc</p>
        </div>
    </footer>


@endsection
