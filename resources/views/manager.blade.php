@extends("layouts.master1")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des suites de l'hotel : {{ $hotel->name }}</h3>
        <div class="add-suite">
            <a href="{{ route('manager.suite.create') }}" class="btn btn-outline-success">Ajouter une suite</a>
        </div>

        <div class="mt-4">

            <div class="d-flex justify-content-end mb-2">
                {{ $suites->links() }}

            </div>
            @if(session()->has("successDelete"))
                <div class="alert alert-success">
                    <h3>{{ session()->get('successDelete') }}</h3>
                </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Description</th>
                    <th scope="col">Cover</th>
                </tr>
                </thead>
                <tbody>
                @foreach($suites as $suite)
                    <tr><th scope="row">{{ $loop->index +1 }}</th>
                        <td>{{ $suite->name }}</td>
                        <td>{{ $suite->price . ' '. '€' }}</td>
                        <td>{{ $suite->description }}</td>
                        <td>
                            <img src="{{ $suite->getCoverImageUrl() }}" class="cover" alt="Photo de la suite">
                        </td>
                        <td>
                            <a href="{{ route('manager.suite.edit', ['suite' => $suite->id]) }}" class="btn btn-warning">Editer</a>
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cette suite ?')){document.getElementById('form-{{$suite->id}}').submit() }">Supprimer</a>
                            <form id="form-{{ $suite->id }}" action="{{ route('manager.suite.delete', ['suite'=>$suite->id]) }}" method="post">
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
