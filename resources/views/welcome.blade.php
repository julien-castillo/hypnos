@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="welcome border-bottom pb-2 mb-4">Bienvenue sur le groupe hôtelier Hypnos</h3>
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
                                {{--                            <p class="card-text">{{ $hotel->address }}</p>--}}
                                {{--                            <p class="card-text">{{ $hotel->description }}</p>--}}
                                <a href="{{ route('suites', ['hotel' => $hotel]) }}"
                                   class="btn btn-outline-light btn-welcome">Découvrir
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
    @include("layouts.footer")
@endsection
