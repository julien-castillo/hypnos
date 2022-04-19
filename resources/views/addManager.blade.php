@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajouter un nouveau Manager</h3>

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
            @if($hotelsSansManager > 0 or $noManager < 1)
                <form style="width: 55%;" method="post" action="{{ route('admin.adminManager.store') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Etablissements</label>
                        <select class="form-select" name="hotel_id">
                            <option value="">-- Aucun Hôtel --</option>

                            @foreach($hotels as $hotel)

                                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Manager</label>
                        <select class="form-select" name="user_id">
                            <option value="">-- Aucun manager --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->displayFullName() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-danger">Annuler / retour</a>
                </form>
            @else
                <div>
                    <p class="addManager-error">Tous les hôtels ont un manager. Veuillez d'abord créer un
                        établissement.</p>
                    <div class="add-hotel">
                        <a href="{{ route('admin.hotel.create') }}" class="btn btn-primary">Ajouter un
                            établissement</a>
                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection
