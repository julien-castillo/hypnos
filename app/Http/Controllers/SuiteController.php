<?php

namespace App\Http\Controllers;


use App\Models\Suite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuiteController extends Controller {

    /**
     * List of suites
     */
    public function index() {

        $user = Auth::user();
        $hotel = $user->hotel;
        $suites = $hotel->suites()->orderBy("name", "asc")->paginate(10);
        return view('manager', compact("suites", "hotel"));
    }

    /**
     * Shows form for suite creation.
     */
    public function create() {
        return view('addSuite');
    }

    public function store(Request $request) {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
        ]);


        // Suite::create($request->all()); avec fillable dans model

        $suite = Suite::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
        ]);

        $user = Auth::user();
        $hotel = $user->hotel;
        $suite->hotel()->associate($hotel);
        $suite->save();

        return back()->with("success", "La suite a été ajoutée avec succès !");

    }

    public function edit(Suite $suite) {
        return view("editSuite", compact('suite'));
    }

    public function update(Request $request, Suite $suite) {

        $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
        ]);

        $suite->update([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
        ]);
        return back()->with("success", "La suite a été modifiée avec succès !");

    }

    public function delete(Suite $suite) {
        $name = $suite->name;
        $suite->delete();

        return back()->with("successDelete", "La suite {$name} a été supprimée avec succès !");

    }


}
