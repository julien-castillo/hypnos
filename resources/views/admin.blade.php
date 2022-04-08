@extends("layouts.master")

@section("admin")
    <div class="block">
        {{-- Sidebar Admin --}}
        <div class="sidebar">
            <h1 class="visually-hidden">Sidebars examples</h1>

            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"/>
                    </svg>
                    <span class="fs-4">Sidebar</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"/>
                            </svg>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"/>
                            </svg>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"/>
                            </svg>
                            Customers
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                       id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- End of Sidebar Admin --}}

        <div class="block1">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 class="border-bottom pb-2 mb-4">Liste des établissements</h3>
                <div class="mt-4">
                    <div class="d-flex justify-content-end mb-2">
                        {{ $hotels->links() }}
                        <div>
                            <a href="{{ route('admin.hotel.create') }}" class="btn btn-primary">Ajouter un
                                établissement</a>
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
                            {{--                    <th scope="col">#</th>--}}
                            <th scope="col">Ville</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Description</th>
                            <th scope="col">Manager</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hotels as $hotel)
                            <tr>
                                {{--                        <th scope="row">{{ $loop->index +1 }}</th>--}}
                                <td>{{ $hotel->city }}</td>
                                <td>{{ $hotel->name }}</td>
                                <td>{{ $hotel->address }}</td>
                                <td>{{ $hotel->description }}</td>
                                <td>{{ $hotel->user ? $hotel->user->displayFullName() : 'Non défini' }}</td>
                                <td>
                                    <img src="{{ asset('images/' .  $hotel->image_path) }}" alt="Photo de l'hôtel">
                                </td>
                                <td>
                                    <a href="{{ route('admin.hotel.edit', ['hotel' => $hotel->id]) }}"
                                       class="btn btn-warning">Editer</a>
                                    <a href="#" class="btn btn-danger"
                                       onclick="if(confirm('Voulez-vous vraiment supprimer cet établissement ?')){document.getElementById('form-{{$hotel->id}}').submit() }">Supprimer</a>
                                    <form id="form-{{ $hotel->id }}"
                                          action="{{ route('admin.hotel.delete', ['hotel'=>$hotel->id]) }}"
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

            </div>
        </div>
    </div>
@endsection
