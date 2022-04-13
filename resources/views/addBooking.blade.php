@extends("layouts.master1")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <h3 class="border-bottom pb-2 mb-4">Formulaire de réservation</h3>

        <div class="mt-4">
            @if(session()->has("success"))
                <div class="alert alert-success">
                    <h3>{{ session()->get('success') }}</h3>
                </div>
            @endif

            @if ($errors->any())
                <div class=" alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form style="width: 45%;" method="post" action="{{ route('booking.store') }}">

                @csrf
                {{--                <input type="hidden" name="_method" value="put">--}}

                <div class="mb-3">
                    <label for="hotel" class="form-label">Hôtel :</label>
                    <select class="form-select" name="hotel" required>
                        <option value="">-- Selectionner un hôtel --</option>
                        @foreach($hotels as $hotel)
                            <option
                                value="{{ $hotel->name }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="suite" class="form-label">Suite :</label>
                    <select class="form-select" name="suite" required>
                        <option value="">-- Selectionner une suite --</option>

                            @if($suites->count() < 1)
                                <option value="">-- Aucune suite disponible --</option>
                            @else
                            @foreach($suites as $suite)
                            <option
                                value="{{ $suite->id }}">{{ $suite->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label for="user" class="form-label">Client</label>--}}
{{--                    <input type="text" class="form-control" value="{{ $user->id }}" name="user" required>--}}
{{--                </div>--}}
                <div class="mb-3">
                    <label for="startDate" class="form-label">Date d'arrivée</label>
                    <input type="date" class="form-control" value="" name="startDate" required>
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">Date de départ</label>
                    <input type="date" class="form-control" value="" name="endDate" required>
                </div>


                <a href="" class="btn btn-danger">Annuler / Retour</a>
                <button type="submit" class="btn btn-success">Réserver</button>
            </form>

        </div>

    </div>
@endsection
