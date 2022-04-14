<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Suite;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller {
    /**
     * List of bookings
     */
    public function index() {
        $user = Auth::user();
        $booking = $user->booking;

        $today = Carbon::now();
        $expDate = Carbon::now()->addDays(3);

        $hotels = Hotel::first();
        $suites = Suite::first();
        $bookings = Booking::where('user_id', $user->id)->orderBy("startDate", "desc")->paginate(10);
        $users = User::all();

        return view('booking', compact('hotels', 'suites', 'bookings', 'users','expDate', 'today', 'booking'));
    }

    public function create() {
//
        return view('addBooking');
    }

    public function store(Request $request) {

        $request->validate([
            "startDate" => "required",
            "endDate" => "required",
            "suite" => "required",
            "hotel" => "required",
        ]);


        $booking = Booking::create([
            "startDate" => $request->input('startDate'),
            "endDate" => $request->input('endDate'),
            "suite_id" => $request->input('suite'),
            "user_id" => Auth::id(),
            "hotel" => $request->input('hotel'),
        ]);


        $booking->save();

        return redirect('')->with("success", "Votre réservation est effectuée, nous vous remercions.");

    }


    public function delete(Booking $booking) {
        $booking->delete();

        return redirect('')->with("success", "Votre réservation a été annulée.");

    }
    /**
     * Check if Booking is possible
     */
    public function checkIfFree(Request $request) {



        return response('Success');
    }
}
