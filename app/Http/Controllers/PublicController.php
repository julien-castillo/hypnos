<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Image;
use App\Models\Suite;
use Illuminate\Http\Request;

class PublicController extends Controller {

    public function suites(Hotel $hotel) {
        $suites = $hotel->suites()->orderBy("name", "asc")->paginate(10);
        return view('suites', compact("suites", "hotel"));
    }

    public function suite(Hotel $hotel, Suite $suite) {
//        $images = Image::where('storage_path', $suite->id);
        $images = Image::all();
        return view('details', compact("suite", "hotel", 'images'));
    }

    public function contact() {
        return view('contact');
    }

    public function booking() {
        $hotels = Hotel::all();
        return view('addBooking', compact('hotels'));
    }
}
