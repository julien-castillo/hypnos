<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class HotelController extends Controller {

    /**
     * List of hotels
     */
    public function index() {
        $hotels = Hotel::orderBy("name", "asc")->paginate(10);
        return view('admin', compact("hotels"));
    }

    /**
     * Shows form for hotel creation.
     */
    public function create() {
        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
        return view('addHotel', compact("users"));
    }

    public function store(Request $request) {
        $request->validate([
            "name" => "required",
            "city" => "required",
            "address" => "required",
            "description" => "required",
        ]);

        $user = User::find($request->user_id);

        // Hotel::create($request->all()); avec fillable dans model

        $hotel = Hotel::create([
            "name" => $request->name,
            "city" => $request->city,
            "address" => $request->address,
            "description" => $request->description,
        ]);
        $hotel->user()->associate($user);
        $hotel->save();

        return back()->with("success", "Etablissement ajouté avec succès !");

    }

    public function edit(Hotel $hotel) {
        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
        return view("editHotel", compact("hotel", "users"));
    }

    public function update(Request $request, Hotel $hotel) {

        $request->validate([
            "name" => "required",
            "city" => "required",
            "address" => "required",
            "description" => "required",
        ]);

        $hotel->update([
            "name" => $request->name,
            "city" => $request->city,
            "address" => $request->address,
            "description" => $request->description,
        ]);
        return back()->with("success", "Etablissement modifié avec succès !");

    }

    public function delete(Hotel $hotel) {
        $name = $hotel->name;
        $hotel->delete();

        return back()->with("successDelete", "'$name' a été supprimé avec succès !");

    }


}
