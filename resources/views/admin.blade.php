@extends("layouts.master")

@section("admin")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des étabissements</h3>
        <div class="mt-4">
            <div class="d-flex justify-content-end mb-2">
                {{ $hotels->links() }}
                <div>
                    <a href="{{ route('hotel.add') }}" class="btn btn-primary">Ajouter un établissement</a>
                </div>
            </div>
            @if(session()->has("successDelete"))
                <div class="alert alert-success">
                    <h3>{{ session()->get('successDelete') }}</h3>
                </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Description</th>
                    <th scope="col">Manager</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <th scope="row">{{ $loop->index +1 }}</th>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->city }}</td>
                        <td>{{ $hotel->address }}</td>
                        <td>{{ $hotel->description }}</td>
                        <td>{{ $hotel->user->id ?? 'Non défini'}}</td>
                        <td>
                            <a href="{{ route('hotel.edit', ['hotel' => $hotel->id]) }}" class="btn btn-warning">Editer</a>
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet établissement ?')){document.getElementById('form-{{$hotel->id}}').submit() }">Supprimer</a>
                            <form id="form-{{ $hotel->id }}" action="{{ route('hotel.delete', ['hotel'=>$hotel->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">

                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
