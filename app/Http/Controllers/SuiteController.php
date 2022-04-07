<?php

namespace App\Http\Controllers;


use App\Models\Suite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SuiteController extends Controller {

    /**
     * List of suites
     */
    public function index() {

        $user = Auth::user();
        $hotel = $user->hotel;
        if(!$hotel) {
            return back()->withErrors("Vous n'avez accès à aucun hôtel");
        }

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
//            "photo1" => "required|mimes:jpg,png,jpeg|max:5048",
//            "photo2" => "required|mimes:jpg,png,jpeg|max:5048",
//            "photo3" => "required|mimes:jpg,png,jpeg|max:5048",
//            "photo4" => "required|mimes:jpg,png,jpeg|max:5048",
        ]);

//        $newImageName1 = time() . '-' . $request->name . '.' . $request->photo1->extension();
//        $request->photo1->move(public_path('images'), $newImageName1);
//        $image150 = Image::make(public_path("images/{$newImageName1}"))->fit(150, 150);
//        $image150->save();
//
//        $newImageName2 = time() . '-' . $request->name . '.' . $request->photo2->extension();
//        $request->photo2->move(public_path('images'), $newImageName2);
//        $image150 = Image::make(public_path("images/{$newImageName2}"))->fit(150, 150);
//        $image150->save();
//
//        $newImageName3 = time() . '-' . $request->name . '.' . $request->photo3->extension();
//        $request->photo3->move(public_path('images'), $newImageName3);
//        $image150 = Image::make(public_path("images/{$newImageName3}"))->fit(150, 150);
//        $image150->save();
//
//        $newImageName4 = time() . '-' . $request->name . '.' . $request->photo4->extension();
//        $request->photo4->move(public_path('images'), $newImageName4);
//        $image150 = Image::make(public_path("images/{$newImageName4}"))->fit(150, 150);
//        $image150->save();





//        $image300 = Image::make(public_path("images/{$newImageName}"))->fit(300, 300);
//        $image300->save();


        // Suite::create($request->all()); avec fillable dans model

        $suite = Suite::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
//            "image_path1" => $newImageName1,
//            "image_path2" => $newImageName2,
//            "image_path3" => $newImageName3,
//            "image_path4" => $newImageName4,
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
