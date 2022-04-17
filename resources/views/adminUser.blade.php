@extends("layouts.masterAdmin")
@section("content")
    <div class="block">
        {{-- Sidebar Admin --}}
        <div>
            <h1 class="visually-hidden">Sidebars examples</h1>

            <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                <a href="/"
                   class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"/>
                    </svg>
                    <span class="fs-4">Admin Panel</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link text-white" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"/>
                            </svg>
                            Hôtels ({{ $hotels->count() }})
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.adminManager.listSuites') }}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"/>
                            </svg>
                            Suites ({{ $suites->count() }})
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.adminManager.listManagers') }}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"/>
                            </svg>
                            Managers ({{ $managers->count() }})
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.adminContact.index') }}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"/>
                            </svg>
                            Messages <span class="message">({{ $contacts->count() }})</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.adminManager.listUsers') }}" class="nav-link active text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"/>
                            </svg>
                            Clients ({{ $users->count() }})
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- End of Sidebar Admin --}}

        <div class="block1">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 class="border-bottom pb-2 mb-4">Liste des Clients ( {{ $users->count() }} )</h3>

                @if($users->count() >= 1)
                    <div class="mt-4">
                        @if(session()->has("successDelete"))
                            <div class="alert alert-success">
                                <h3>{{ session()->get('successDelete') }}</h3>
                            </div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Client (Prénom Nom)</th>
                                <th scope="col">email</th>
                                <th scope="col">Client depuis le</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y à H:i:s') }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                @else
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <h4 class="border-bottom pb-2 mb-4">Vous n'avez reçu aucun message</h4>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @include("layouts.footer")
@endsection
