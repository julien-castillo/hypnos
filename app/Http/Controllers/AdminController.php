<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Suite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    /**
     * List of Managers
     */
    public function listManagers() {
        $user = Auth::user();
        $hotels = Hotel::where('user_id', $user->id)->get();
        $suites = Suite::all();
        $contacts = Contact::all();
        $managers = User::where('role', 'manager')->get();
        $users = User::where('role', 'user')->get();
        return view('adminManager', compact("hotels", "suites", "contacts", "users", "managers"));
    }

    /**
     * List of Users
     */
    public function listUsers() {
        $hotels = Hotel::orderBy("name", "asc")->paginate(10);
        $suites = Suite::all();
        $contacts = Contact::all();
        $managers = User::where('role', 'manager')->get();
        $users = User::where('role', 'user')->get();
        return view('adminUser', compact("hotels", "suites", "contacts", "users", "managers"));
    }

    /**
     * List of Suites
     */
    public function listSuites() {
        $hotels = Hotel::orderBy("name", "asc")->paginate(10);
        $suites = Suite::all();
        $contacts = Contact::all();
        $managers = User::where('role', 'manager')->get();
        $users = User::where('role', 'user')->get();
//        $totalSuites = Suite::where('')
        return view('adminSuite', compact("hotels", "suites", "contacts", "users", "managers"));
    }

//    /**
//     * Shows form for hotel creation.
//     */
//    public function create() {
//        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
//        return view('addHotel', compact("users"));
//    }
//
//    public function store(Request $request) {
//
//        $request->validate([
//            "name" => "required",
//            "city" => "required",
//            "address" => "required",
//            "description" => "required",
//            "photo" => "required|mimes:jpg,png,jpeg|max:5048"
//        ]);
//
//        $newImageName = time() . '-' . $request->city . '.' . $request->photo->extension();
//        $request->photo->move(public_path('images'), $newImageName);
//
//        $image = Image::make(public_path("images/{$newImageName}"))->fit(150, 150);
//        $image->save();
//
//
//        $user = User::find($request->user_id);
//
//        // Hotel::create($request->all()); avec fillable dans model
//
//        $hotel = Hotel::create([
//            "name" => $request->input('name'),
//            "city" => $request->input('city'),
//            "address" => $request->input('address'),
//            "description" => $request->input('description'),
//            "image_path" => $newImageName,
//        ]);
//        $hotel->user()->associate($user);
//        $hotel->save();
//
//        return back()->with("success", "Etablissement ajouté avec succès !");
//
//    }
//
//    public function edit(Hotel $hotel) {
//        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
//        return view("editHotel", compact("hotel", "users"));
//    }
//
//    public function update(Request $request, Hotel $hotel) {
//
//        $request->validate([
//            "name" => "required",
//            "city" => "required",
//            "address" => "required",
//            "description" => "required",
//            "photo" => "mimes:jpg,png,jpeg|max:5048"
//        ]);
//
//        $newImageName = time() . '-' . $request->city . '.' . $request->photo->extension();
//        $request->photo->move(public_path('images'), $newImageName);
//
//        $image = Image::make(public_path("images/{$newImageName}"))->fit(150, 150);
//        $image->save();
//
//        $hotel->update([
//            "name" => $request->name,
//            "city" => $request->city,
//            "address" => $request->address,
//            "description" => $request->description,
//            "image_path" => $newImageName,
//        ]);
//        $user = User::find($request->user_id);
//        $hotel->user()->associate($user);
//        $hotel->save();
//
//        return back()->with("success", "Etablissement modifié avec succès !");
//
//    }
//
//    public function delete(Hotel $hotel) {
//        $name = $hotel->name;
//        $hotel->delete();
//
//        return back()->with("successDelete", "'$name' a été supprimé avec succès !");
//
//    }


}
