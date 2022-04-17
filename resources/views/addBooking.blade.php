@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <h3 class="border-bottom pb-2 mb-4">Formulaire de réservation</h3>

        <div class="mt-4">
{{--            @if(session()->has("success"))--}}
{{--                <div class="alert alert-success">--}}
{{--                    <h3>{{ session()->get('success') }}</h3>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if ($errors->any())--}}
{{--                <div class=" alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <form style="width: 45%;" method="post" action="{{ route('booking.store') }}">

                @csrf
                {{--                <input type="hidden" name="_method" value="put">--}}

                <div class="mb-3">
                    <label for="hotel" class="form-label">Hôtel :</label>
                    <select class="form-select" name="hotel" id="hotel" required>
                        <option value="">-- Selectionner un hôtel --</option>
                        @foreach($hotels as $hotel)
                            <option
                                value="{{ $hotel->id }}" {{ $selected_hotel == $hotel->id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="suite" class="form-label">Suite :</label>
                    <select class="form-select" name="suite" id="suite" data-selected-suite="{{ $selected_suite }}"
                            required>
                        {{-- ajax/suites--}}
                        @include('ajax.suites')
                    </select>
                </div>
                {{--                <div class="mb-3">--}}
                {{--                    <label for="user" class="form-label">Client</label>--}}
                {{--                    <input type="text" class="form-control" value="{{ $user->id }}" name="user" required>--}}
                {{--                </div>--}}
                <div class="mb-3">
                    <label for="startDate" class="form-label">Date d'arrivée</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" min="{{ date('Y-m-d') }}"
                           required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">Date de départ</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" required autocomplete="off">
                </div>

                <div id="availability_response" class="alert alert-primary">Veuillez remplir tous les champs.</div>

                <a href="{{ route('home') }}" class="btn btn-danger">Annuler / Retour</a>

                <button type="submit" class="btn btn-success" id="btn_reserver" hidden >Réserver</button>

            </form>

        </div>

    </div>
    @include("layouts.footer")
@endsection
@push('scripts')
    <script>
        (function ($) {

            var token = $('meta[name="csrf-token"]').attr('content');
            getHotelSuites();

            // Get hotel's suites when hotel is selected.
            $('#suite').on('change', function () {
                checkAvailability();
            });

            $('#hotel').on('change', function () {
                getHotelSuites();
            });

            // Set minimum date of end date when start date is selected.
            $('#startDate').on('change', function () {
                var date = $(this).val();
                $('#endDate').attr('min', date).val('');
            });

            // Check for room availability when end date is selected.
            $('#endDate').on('change', function () {
                checkAvailability();
            });

            function getHotelSuites() {
                var hotel = $('#hotel').val();
                var selected_suite = $('#suite').attr('data-selected-suite');
                if (hotel !== "") {
                    $.ajax({
                        type: "post",
                        url: 'booking/get-suites',
                        data: {
                            _token: token,
                            hotel: hotel,
                            selected_suite: selected_suite
                        },
                        success: function (response) {
                            console.log(response);
                            $('#suite').html(response);
                        }
                    });
                }
            }

            function checkAvailability() {
                var hotel = $('#hotel').val();
                var suite = $('#suite').val();
                var start_date = $('#startDate').val();
                var end_date = $('#endDate').val();

                if (hotel !== "" && suite !== "" && start_date !== "") {
                    $.ajax({
                        type: "post",
                        url: "/booking/check-availability",
                        data: {
                            _token: token,
                            hotel: hotel,
                            suite: suite,
                            start_date: start_date,
                            end_date: end_date,
                        },
                        success: function (response) {
                            console.log(response);
                            var message = 'La suite est disponible';
                            var cssClass = 'alert alert-success';
                            $("#btn_reserver").prop('hidden', false);

                            if (!response) {
                                message = "La suite n'est PAS DISPONIBLE !";
                                cssClass = 'alert alert-danger';
                                $("#btn_reserver").prop('hidden', true);
                            }
                            $('#availability_response').html(message).attr('class', cssClass);
                        }
                    });
                }
            }

        }(jQuery));
    </script>
@endpush
