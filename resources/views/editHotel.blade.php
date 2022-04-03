@extends("layouts.master")

@section("editHotel")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="update border-bottom pb-2 mb-4">Modification de l'établissement : {{ $hotel->name }}</h3>

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
            <form style="width: 65%;" method="post" action="{{ route('hotel.update', ['hotel'=>$hotel->id]) }}">

                @csrf
                <input type="hidden" name="_method" value="put">

                <div class="mb-3">
                    <label for="name" class="form-label">Nom de l'établissement</label>
                    <input type="text" class="form-control" placeholder="{{ $hotel->name }}" name="name" required>

                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Ville</label>
                    <input type="text" class="form-control" placeholder="{{ $hotel->city }}" name="city" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" placeholder="{{ $hotel->address }}" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" placeholder="{{ $hotel->description }}" name="description" required>
                </div>
                {{--                <div class="mb-3">--}}
                {{--                    <label for="user_id" class="form-label">Manager</label>--}}
                {{--                    <select class="form-control" name="user_id" required>--}}
                {{--                        <option value=""></option>--}}
                {{--                        @foreach($users as $user)--}}
                {{--                            <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
                {{--                        @endforeach--}}
                {{--                    </select>--}}
                {{--                </div>--}}

                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('admin') }}" class="btn btn-danger">Annuler / Retour</a>
            </form>

        </div>

    </div>
@endsection
