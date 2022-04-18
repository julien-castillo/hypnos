<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Suite;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $hotels = Hotel::all();
        $suites = Suite::all();
        $managers = User::where('role', 'manager');
        $contacts = Contact::all();
        $users = User::where('role', 'user')->get();
        return view('welcome',compact('hotels', 'suites', 'managers', 'contacts', 'users'));
    }
}
