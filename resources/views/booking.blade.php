@extends("layouts.master")
@section("content")

    <div class="block">
        {{-- Sidebar User --}}
        <div>
            <h1 class="visually-hidden">Sidebars examples</h1>

            <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                <a href="/"
                   class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"/>
                    </svg>
                    <span class="fs-4">Mon compte</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"/>
                            </svg>
                            Hôtels
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"/>
                            </svg>
                            Suites
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"/>
                            </svg>
                            Managers
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.adminContact.index') }}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"/>
                            </svg>
                            Messages
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"/>
                            </svg>
                            Clients
                        </a>
                    </li>
                </ul>
                {{--                <div class="dropdown">--}}
                {{--                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"--}}
                {{--                       id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">--}}
                {{--                        <strong>mdo</strong>--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">--}}
                {{--                        <li><a class="dropdown-item" href="#">New project...</a></li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Settings</a></li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Profile</a></li>--}}
                {{--                        <li>--}}
                {{--                            <hr class="dropdown-divider">--}}
                {{--                        </li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Sign out</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </div>
        </div>
        {{-- End of Sidebar Admin --}}

        <div class="block1">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 class="border-bottom pb-2 mb-4">Mes réservations</h3>

                <div class="mt-4">
                    <div class="d-flex justify-content-end mb-2">


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
                            {{--                            <th scope="col">Ville</th>--}}
                            <th scope="col">Hôtel</th>
                            <th scope="col">Suite</th>
                            <th scope="col">Date d'arrivée</th>
                            <th scope="col">Date de départ</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <div class="row">
                            @if($bookings->count() > 0)
                                @foreach($bookings as $booking)
                                    <tr>
                                        {{--                                                        <th scope="row">{{ $loop->index +1 }}</th>--}}
                                        {{--                                <td>{{ $hotels->city }}</td>--}}
                                        <td>{{ $hotels->city }}</td>
                                        <td>{{ $suites->name }}</td>
                                        <td>{{ $booking->startDate }}</td>
                                        <td>{{ $booking->endDate }}</td>
                                        <td>
                                            @if( $booking->startDate > $expDate)
                                                <a href="#" class="btn btn-danger"
                                                   onclick="if(confirm('Voulez-vous vraiment annuler cette réservation ?')){document.getElementById('form-{{$booking->id}}').submit() }">Annuler</a>
                                                <form id="form-{{ $booking->id }}"
                                                      action="{{ route('booking.delete', ['booking'=>$booking->id]) }}"
                                                      method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                            @elseif ( $booking->startDate > $today and $booking->startDate < $expDate)
                                                <a href="#" class="btn btn-outline-danger"
                                                   onclick="if(confirm('Votre réservation commence dans moins de trois jours, il est malheureusement impossible de l\'annuler.')){document.getElementById('form-{{$booking->id}}').submit() }">Impossible
                                                    d'annuler</a>

                                            @elseif ( $booking->startDate < $today )
                                                <a href="#" class="btn btn-outline-success"
                                                   onclick="if(confirm('Merci d\'avoir effectué cette réservation, nous espérons vous revoir très prochainement')){document.getElementById('form-{{$booking->id}}').submit() }">Ancienne
                                                    réservation</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="my-3 p-3 bg-body rounded shadow-sm">
                                    <h4 class="border-bottom pb-2 mb-4">Vous n'avez effectué aucune réservation pour le
                                        moment.</h4>
                                </div>
                            @endif
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include("layouts.footer")
@endsection


