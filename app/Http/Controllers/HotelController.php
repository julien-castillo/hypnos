<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Suite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HotelController extends Controller {

    /**
     * List of hotels
     */
    public function index() {
        $hotels = Hotel::orderBy("name", "asc")->paginate(10);
        $suites = Suite::all();
        $contacts = Contact::all();
        $managers = User::where('role', 'manager')->get();
        $users = User::where('role', 'user')->get();
        return view('admin', compact("hotels", "suites", "contacts", "users", "managers"));
    }

    /**
     * Shows form for hotel creation.
     */
    public function create() {
        $hotels = Hotel::all();
        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
        $suites = Suite::all();
        $managers = User::where('role', 'manager')->get();
        $contacts = Contact::all();
        return view('addHotel', compact("users", 'hotels', 'suites', 'managers', 'contacts'));
    }

    public function store(Request $request) {

        $request->validate([
            "name" => "required",
            "city" => "required",
            "address" => "required",
            "description" => "required",
            "photo" => "required|mimes:jpg,png,jpeg|max:5048"
        ]);

        $file = $request->file("photo");
        $filename = $file->getRealPath();
        $newImageName = time() . '-' . $file->getClientOriginalName();
        $image_path = "coverHotel/{$newImageName}";

        Storage::disk('public')->put($image_path, file_get_contents($filename));

        $img = Image::make('storage/'. $image_path);
        $img->fit(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save('storage/' . $image_path);

//        $newImageName = time() . '-' . $request->city . '.' . $request->photo->extension();
//        $request->photo->move(public_path('images'), $newImageName);
//        $image = SuiteImage::make(public_path("images/{$newImageName}"))->fit(150, 150);
//        $image->save();



        $user = User::find($request->user_id);

        // Hotel::create($request->all()); avec fillable dans model

        $hotel = Hotel::create([
            "name" => $request->input('name'),
            "city" => $request->input('city'),
            "address" => $request->input('address'),
            "description" => $request->input('description'),
            "image_path" => $newImageName,
        ]);
        $hotel->user()->associate($user);
        $hotel->save();

        return back()->with("success", "Etablissement ajouté avec succès !");

    }

    public function edit(Hotel $hotel) {
        $hotels = Hotel::all();
        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
        $suites = Suite::all();
        $managers = User::where('role', 'manager')->get();
        $contacts = Contact::all();
        return view("editHotel", compact("hotel", "users", 'suites', 'managers', 'contacts', 'hotels'));
    }

    public function update(Request $request, Hotel $hotel) {

        $request->validate([
            "name" => "required",
            "city" => "required",
            "address" => "required",
            "description" => "required",
            "photo" => "mimes:jpg,png,jpeg|max:5048"
        ]);

        if($request->hasFile('photo')) {
            if (Storage::disk('public')->exists($hotel->image_path)) {
                Storage::disk('public')->delete($hotel->image_path);
            }
            $file = $request->file('photo');
            $filename = $file->getRealPath();

            $newImageName = time() . '-' . $file->getClientOriginalName();
            $image_path = "coverHotel/{$newImageName}";
            $hotel->image_path = $newImageName;

            Storage::disk('public')->put($image_path, file_get_contents($filename));

            $img = Image::make('storage/'. $image_path);
            $img->fit(150, 150, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save('storage/' . $image_path);
        }

        $hotel->update([
            "name" => $request->name,
            "city" => $request->city,
            "address" => $request->address,
            "description" => $request->description,
        ]);
        $user = User::find($request->user_id);
        $hotel->user()->associate($user);
        $hotel->save();

        return back()->with("success", "Etablissement modifié avec succès !");

    }

    public function delete(Hotel $hotel) {
        $name = $hotel->name;
        $hotel->delete();

        return back()->with("successDelete", "'$name' a été supprimé avec succès !");

    }


}
