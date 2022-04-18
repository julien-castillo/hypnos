@extends("layouts.master")


@section("content")
    @include("Layouts.AdminDashboard")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="update border-bottom pb-2 mb-4">Géstion des Managers : {{ $user->hotel->name }}</h3>

        <div class="mt-4">
            <form style="width: 65%;" method="post" action="{{ route('admin.adminManager.update', ['user'=>$user->id]) }}" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="_method" value="put">

                <div class="mb-3">
                    <label for="name" class="form-label">Nom de l'établissement</label>
                    <input type="text" class="form-control" value="{{ $user->hotel->name }}" name="name" required>

                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Ville</label>
                    <input type="text" class="form-control" value="{{ $user->hotel->city }}" name="city" required>
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('admin.index') }}" class="btn btn-danger">Annuler / Retour</a>
            </form>

        </div>

    </div>
{{--    @include("layouts.footer")--}}
@endsection
