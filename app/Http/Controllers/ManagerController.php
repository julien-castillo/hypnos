<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Suite;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ManagerController extends Controller {

//    /**
//     * List of hotels
//     */
//    public function index() {
//        $hotels = Hotel::orderBy("name", "asc")->paginate(10);
//        $suites = Suite::all();
//        $contacts = Contact::all();
//        $managers = User::where('role', 'manager')->get();
//        $users = User::where('role', 'user')->get();
//        return view('admin', compact("hotels", "suites", "contacts", "users", "managers"));
//    }

    /**
     * Shows form for manager creation.
     */
    public function create() {
        $users = User::where('role', 'user')->orderBy('lastname', 'asc')->get();
        $hotels = Hotel::where('user_id', null)->get();

        $hotelsSansManager = Hotel::where('user_id', null)->count();
        $noManager = User::where('role', 'manager')->count();
        return view('addManager', compact("users", "hotels", "hotelsSansManager", "noManager"));
    }

    public function store(Request $request) {

        $request->validate([
            "hotel_id" => "required",
            "user_id" => "required",
        ]);

        $user = User::find($request->get('user_id'));
        $hotel = Hotel::find($request->hotel_id);


        $user->role = 'manager';

        $hotel->user_id = $user->id;

        $hotel->save();
        $user->save();

        return back()->with("success", "Manager ajouté avec succès !");

    }


    public function edit(User $user) {
        $hotels = Hotel::all();
        $suites = Suite::all();
        $managers = User::where('role', 'manager')->get();
        $contacts = Contact::all();

        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
        return view("editManager", compact("hotels", "users", 'suites', 'managers', 'contacts', 'user'));
    }

//
    public function update(Request $request, Hotel $hotel) {

        $request->validate([
            "name" => "required",
        ]);


        $hotel->update([
            "name" => $request->name,
        ]);
        $user = User::find($request->user_id);
        $hotel->user()->associate($user);
        $hotel->save();

        return back()->with("success", "Etablissement modifié avec succès !");

    }

    public function delete(User $user, Request $request) {
        $user->role = 'user';

        $user->save();

        return redirect('/admin/adminManager')->with("successDelete", "Le manager a été supprimé, il est désormais un simple client enregistré.");

    }


}
