<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Suite;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\View;
use Psy\VersionUpdater\IntervalChecker;

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

        return view('booking', compact('hotels', 'suites', 'bookings', 'users', 'expDate', 'today', 'booking'));
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

    public function getHotelSuites(Request $request) {

        $suites = Suite::where('hotel_id', $request->hotel)->get();

        return View::make('ajax/suites', [
            'suites' => $suites,
        ])->render();
    }

    /**
     * Check if Booking is possible
     */
    public function checkAvailability(Request $request) {
        $bookings = Booking::where('suite_id', $request->suite)
            ->where(function ($query) use ($request) {
                $query->where('startDate', '>=', $request->start_date)
                    ->orWhere('endDate', '<=', $request->end_date);
            })
            ->get();

        $start = new \DateTime($request->start_date);
        $end = new \DateTime($request->end_date);

        $available = TRUE;

        foreach ($bookings as $booking) {
            $booking_start = new \DateTime($booking->startDate);
            $booking_end = new \DateTime($booking->endDate);
            $current_date = $booking_start;

            while ($current_date < $booking_end) {
                if ($current_date >= $start && $current_date <= $end) {
                    $available = FALSE;
                }

                $current_date->add(new \DateInterval('P1D'));
            }
        }

        return response($available);
    }

}
