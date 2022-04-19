@extends("layouts.master")
@section("content")

    <div class="block">

        <div class="block1">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 class="border-bottom pb-2 mb-4">Mes réservations</h3>

                <div class="mt-4">
{{--                    <div class="d-flex justify-content-end mb-2">--}}


{{--                    </div>--}}
                    @if($bookings->count() > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Destination</th>
                                <th scope="col">Hôtel</th>
                                <th scope="col">Suite</th>
                                <th scope="col">Date d'arrivée</th>
                                <th scope="col">Date de départ</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <div class="row">

                                @foreach($bookings as $booking)
                                        <td>{{ $booking->suite->hotel->city }}</td>
                                        <td>{{ $booking->suite->hotel->name }}</td>
                                        <td>{{ $booking->suite->name }}</td>
                                        <td>{{ $booking->startDate->format('d/m/Y') }}</td>
                                        <td>{{ $booking->endDate->format('d/m/Y') }}</td>
                                        <td>
                                            @if( $booking->startDate > $expDate)
                                                <a href="#" class="btn btn-outline-danger"
                                                   onclick="if(confirm('Voulez-vous vraiment annuler cette réservation ?')){document.getElementById('form-{{$booking->id}}').submit() }">Annuler</a>
                                                <form id="form-{{ $booking->id }}"
                                                      action="{{ route('booking.delete', ['booking'=>$booking->id]) }}"
                                                      method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                            @elseif ( $booking->startDate > $today and $booking->startDate < $expDate)
                                                <a href="#" class="btn btn-danger"
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

                            </div>
                            </tbody>
                        </table>
                    @else
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h4 class="border-bottom pb-2 mb-4">Vous n'avez effectué aucune réservation pour le
                                moment.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{--    @include("layouts.footer")--}}
@endsection


