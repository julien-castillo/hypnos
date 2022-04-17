<?php

namespace App\Http\Controllers;


use App\Models\Suite;
use App\Models\SuiteImage;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

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
            $filename = $file->getRealPath();
            $newImageName = time() . '-' . $file->getClientOriginalName();
            $storage_path = "cover/{$newImageName}";

            Storage::disk('public')->put($storage_path, file_get_contents($filename));

            $img = Image::make('storage/'. $storage_path);
            $img->fit(150, 150, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save('storage/' . $storage_path);
        }


        $suite = Suite::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "cover" => $storage_path,
        ]);

        $user = Auth::user();
        $hotel = $user->hotel;
        $suite->hotel()->associate($hotel);
        $suite->save();

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {

                $filename = $file->getRealPath();
                $newImageName = time() . '-' . $file->getClientOriginalName();
                $storage_path = "suites/{$suite->id}/{$newImageName}";

                Storage::disk('public')->put($storage_path, file_get_contents($filename));

                $img = Image::make('storage/'. $storage_path);
                $img->fit(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save('storage/' . $storage_path);

                $data['storage_path'] = $storage_path;
                $data['suite_id'] = $suite->id;

                SuiteImage::create($data);
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
        ]);

        foreach ($request->oldImagesDeleted as $x) {
            if ($x !== "clone") {
                $image = SuiteImage::find($x);

                // Supprime le fichier en lui-meme
                if (Storage::disk('public')->exists($image->storage_path)) {
                    Storage::disk('public')->delete($image->storage_path);
                }

                // Supprime l'entrée en base de données
                $image->delete();
            }
        }

        if ($request->hasFile("cover")) {
            // Delete previous image
            if (Storage::disk('public')->exists($suite->cover)) {
                Storage::disk('public')->delete($suite->cover);
            }

            $file = $request->file("cover");
            $filename = $file->getRealPath();
            $newImageName = time() . '-' . $file->getClientOriginalName();
            $storage_path = "cover/{$newImageName}";

            Storage::disk('public')->put($storage_path, file_get_contents($filename));

            $img = Image::make('storage/'. $storage_path);
            $img->fit(150, 150, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save('storage/' . $storage_path);
            $suite->cover = $storage_path;
        }

        $suite->update([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
        ]);

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {

                $filename = $file->getRealPath();
                $newImageName = time() . '-' . $file->getClientOriginalName();
                $storage_path = "suites/{$suite->id}/{$newImageName}";

                Storage::disk('public')->put($storage_path, file_get_contents($filename));

                $img = Image::make('storage/'. $storage_path);
                $img->fit(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save('storage/' . $storage_path);

                $data['storage_path'] = $storage_path;
                $data['suite_id'] = $suite->id;

                SuiteImage::create($data);
            }
        }

        $suite->save();
        return redirect('/manager')->with("success", "La suite a été modifiée avec succès !");
    }

    public function delete(Suite $suite) {


// todo ok pour suppression fichier cover mais pas images
        Storage::disk('public')->delete($suite->cover);

        foreach ($suite->images as $image) {
            Storage::disk('public')->delete($image->storage_path);
        }
        Storage::disk('public')->deleteDirectory("suites/{$suite->id}");

        $name = $suite->name;
        $suite->delete();

        return back()->with("successDelete", "La suite {$name} a été supprimée avec succès !");

    }


}
