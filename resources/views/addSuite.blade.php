@extends("layouts.master")

@section("addHotel")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajout d'une nouvelle suite</h3>

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
            <form style="width: 65%;" method="post" action="{{ route('manager.suite.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la suite</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" required>
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label for="photo1" class="form-label">Photo n°1 (mise en avant)</label>--}}
{{--                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="photo1">--}}
{{--                </div>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="photo2" class="form-label">Photo n°2</label>--}}
{{--                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="photo2">--}}
{{--                </div>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="photo3" class="form-label">Photo n°3</label>--}}
{{--                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="photo3">--}}
{{--                </div>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="photo4" class="form-label">Photo n°4</label>--}}
{{--                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="photo4">--}}
{{--                </div>--}}

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('manager.index') }}" class="btn btn-danger">Annuler</a>
            </form>

        </div>

    </div>
@endsection
