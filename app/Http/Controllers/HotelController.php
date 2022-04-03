<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index() {
        $hotels = Hotel::orderBy("id", "asc")->paginate(10);
        return view('admin', compact("hotels"));
    }

    public function create() {
        $users = USER::all();
        return view('addHotel', compact("users"));
    }

    public function store(Request $request) {
        $request->validate([
            "name" =>"required",
            "city" =>"required",
            "address" =>"required",
            "description" =>"required",
        ]);

        // Hotel::create($request->all()); avec fillable dans model

        Hotel::create([
            "name"=>$request->name,
            "city"=>$request->city,
            "address"=>$request->address,
            "description"=>$request->description,
        ]);

        return back()->with("success", "Etablissement ajouté avec succès !");

    }

    public function edit(Hotel $hotel) {
        $users = User::all();
        return view("editHotel", compact("hotel", "users"));
    }

    public function update(Request $request, Hotel $hotel) {

        $request->validate([
            "name" =>"required",
            "city" =>"required",
            "address" =>"required",
            "description" =>"required",
        ]);

        $hotel->update([
            "name"=>$request->name,
            "city"=>$request->city,
            "address"=>$request->address,
            "description"=>$request->description,
        ]);
        return back()->with("success", "Etablissement modifié avec succès !");

    }

    public function delete(Hotel $hotel) {
        $name = $hotel->name;
        $hotel->delete();

        return back()->with("successDelete", "'$name' a été supprimé avec succès !");

    }



}
