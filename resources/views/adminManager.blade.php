@extends("layouts.master2")
@section("content")

    <div class="block">
        @include("layouts.AdminDashboard")


        <div class="block1">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 class="border-bottom pb-2 mb-4">Liste des Managers ( {{ $managers->count() }} )</h3>
                <div class="add-hotel">
                    <a href="{{ route('admin.adminManager.create') }}" class="btn btn-primary">Ajouter un
                        Manager</a>
                </div>
                @if($managers->count() >= 1)
                    <div class="mt-4">
                        {{--                    <div class="d-flex justify-content-end mb-2">--}}

                        {{--                    </div>--}}
                        @if(session()->has("successDelete"))
                            <div class="alert alert-success">
                                <h3>{{ session()->get('successDelete') }}</h3>
                            </div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Nom complet</th>
                                <th scope="col">email</th>
                                <th scope="col">Hôtel</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($managers as $manager)

                                <tr>
                                    <td>{{ $manager->lastname . ' ' . $manager->firstname }}</td>
                                    <td>{{ $manager->email }}</td>
                                    @if($manager->hotel)
                                    <td>{{ $manager->hotel->name }}</td>
                                    @else
                                        <td> Cet utilisateur n'a pas d'hôtel</td>
                                    @endif
                                    {{--                                <td>{{ $contact->user ? $hotel->user->displayFullName() : 'Non défini' }}</td>--}}


                                    <td>
                                        <a href="{{ route('admin.adminManager.update', ['user' => $manager->id]) }}"
                                           class="btn btn-warning">Editer</a>
                                        <a href="#" class="btn btn-danger"
                                           onclick="if(confirm('Voulez-vous vraiment supprimer ce message ?')){document.getElementById('form-{{$manager->id}}').submit() }">Supprimer</a>
                                        <form id="form-{{ $manager->id }}"
                                              action="{{ route('admin.adminManager.delete', ['contact'=>$manager->id]) }}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                @else
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <h4 class="border-bottom pb-2 mb-4">Il n'y a aucun manager</h4>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
