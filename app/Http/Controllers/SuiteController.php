<?php

namespace App\Http\Controllers;


use App\Models\Suite;
use App\Models\Image;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Intervention\Image\Facades\Image;

class SuiteController extends Controller {

    /**
     * List of suites
     */
    public function index() {
        $user = Auth::user();
        $hotel = $user->hotel;
        if (!$hotel) {
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
            "cover" => "required",
        ]);

        if ($request->hasFile("cover")) {
            $file = $request->file("cover");
            $newImageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('cover/'), $newImageName);

//            $image = Image::make(public_path("cover/{$newImageName}"))->fit(300, 300);
//            $image->save();
        }


        // Suite::create($request->all()); avec fillable dans model

        $suite = Suite::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "cover" => $newImageName,
        ]);

        $user = Auth::user();
        $hotel = $user->hotel;
        $suite->hotel()->associate($hotel);
        $suite->save();

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $newImageName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('images/'), $newImageName);
                $request['image'] = $newImageName;
                $request['suite_id'] = $suite->id;

//                $image = Image::make(public_path("images/{$newImageName}"))->fit(300, 300);
//                $image->save();

                Image::create($request->all());
            }
        }

        return redirect('/manager')->with("success", "La suite a été ajoutée avec succès !");

    }

    public function edit(Suite $suite) {
        return view("editSuite", compact('suite'));
    }

    public function update(Request $request, Suite $suite) {

        $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "cover" => "required",
        ]);
//        $suite = Suite::findOrFail($suite);
//        if ($request->hasFile("cover")) {
//            if (File::exists("cover/".$suite->cover)) {
//                File::delete("/cover".$suite->cover);
//            }
        if ($request->hasFile("cover")) {
            $file = $request->file("cover");
            $newImageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('cover/'), $newImageName);
            $suite->cover = $newImageName;
            echo $newImageName . '<br> <br> ';
//            $image = Image::make(public_path("cover/{$newImageName}"))->fit(300, 300);
//            $image->save();
        }


        $suite->update([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "cover" => $suite->cover,
        ]);

        if ($request->hasFile("images")) {
//            todo virer les images existentes (Cover + Images) => fichiers + BDD
//                $images = Image::where('suite_id', '$images->suite_id');
            $images = Image::where('suite_id', '5');
            foreach ($images as $image) {
                var_export($image);
//                $image->delete();
            }
            die();

            $files = $request->file("images");
            foreach ($files as $file) {
                $newImageName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('images/'), $newImageName);
                $request['image'] = $newImageName;
                $request['suite_id'] = $suite->id;

//                $image = Image::make(public_path("images/{$newImageName}"))->fit(300, 300);
//                $image->save();

                Image::create($request->all());
            }
        }

        $suite->save();
        return redirect('/manager')->with("success", "La suite a été modifiée avec succès !");
    }

    public function delete(Suite $suite) {
        $name = $suite->name;
        $suite->delete();

        return back()->with("successDelete", "La suite {$name} a été supprimée avec succès !");

    }

}
