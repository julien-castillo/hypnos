@extends("layouts.master")

@section("addHotel")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouvel établissement</h3>

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
            <form style="width: 65%;" method="post" action="{{ route('hotel.add') }}">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom de l'établissement</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Ville</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" required>
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

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('admin') }}" class="btn btn-danger">Annuler</a>
            </form>

        </div>

    </div>
@endsection
