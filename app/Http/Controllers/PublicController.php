<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\SuiteImage;
use App\Models\Suite;
use Illuminate\Http\Request;

class PublicController extends Controller {

    public function suites(Hotel $hotel) {
        $suites = $hotel->suites()->orderBy("name", "asc")->paginate(10);
        return view('suites', compact("suites", "hotel"));
    }

    public function suite(Hotel $hotel, Suite $suite) {
        return view('details', compact("suite", "hotel"));
    }

    public function contact() {
        return view('contact');
    }

    public function booking(Request $request) {
      $selected_hotel = $request->hotel ?? NULL;
      $selected_suite = $request->suite ?? NULL;
        $hotels = Hotel::all();
        return view('addBooking', compact('hotels', 'selected_hotel', 'selected_suite'));
    }
}
