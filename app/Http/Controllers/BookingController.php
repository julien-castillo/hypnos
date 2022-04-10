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
//        $hotels = Hotel::where('city', 'city');
        $bookings = Booking::orderBy("startDate", "desc")->paginate(10);
        $users = User::all();


//        $bookings = $user->bookings;
//        if (!$bookings) {
//            return back()->withErrors("Vous n'avez aucune réservation.");
//        }
//        $users = User::where('role', 'user')->orderBy('lastname', 'asc')->get();
        return view('booking', compact('hotels', 'suites', 'bookings', 'users','expDate', 'today', 'booking'));
    }

    public function create() {
//        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
//        return view('addHotel', compact("users"));
//        $contacts = Contact::orderBy("created_at", "asc")->paginate(10);
        return view('addBooking');
    }

    public function store(Request $request) {

        $request->validate([
            "startDate" => "required",
            "endDate" => "required",
            "suite" => "required",
            "hotel" => "required",
        ]);

//        dd($request);

        $booking = Booking::create([
            "startDate" => $request->input('startDate'),
            "endDate" => $request->input('endDate'),
            "suite_id" => $request->input('suite'),
            "user_id" => Auth::id(),
            "hotel" => $request->input('hotel'),
        ]);


//        $user = User::all();
//        $request['user_id'] = $user->id;
//        $request['suite_id'] = $suite->id;
//        $booking->suite()->associate($suite);
//        $booking->user()->associate($user);
        $booking->save();

        return redirect('')->with("success", "Votre réservation est effectuée, nous vous remercions.");

    }


    public function delete(Booking $booking) {
        $booking->delete();

        return redirect('')->with("success", "Votre réservation a été annulée.");

    }
}
