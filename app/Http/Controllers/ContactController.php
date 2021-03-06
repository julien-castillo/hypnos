<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Suite;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller {

    /**
     * List of contact messages
     */
    public function index() {
        $hotels = Hotel::orderBy("name", "asc")->paginate(10);
        $suites = Suite::all();
        $managers = User::where('role', 'manager');
        $users = User::where('role', 'user');
        $contacts = Contact::orderBy("created_at", "asc")->paginate(10);
        return view('adminContact', compact("contacts", 'hotels', 'suites', 'managers', 'users'));
    }

    /**
     * Shows form for contact creation.
     */
    public function create() {
//        $users = User::where('role', 'manager')->orderBy('lastname', 'asc')->get();
//        return view('addHotel', compact("users"));
//        $contacts = Contact::orderBy("created_at", "asc")->paginate(10);
        return view('contact');
    }

    public function store(Request $request) {

        $request->validate([
            "lastname" => "required",
            "firstname" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
        ]);



        $contact = Contact::create([
            "lastname" => $request->input('lastname'),
            "firstname" => $request->input('firstname'),
            "email" => $request->input('email'),
            "subject" => $request->input('subject'),
            "message" => $request->input('message'),
        ]);
        $contact->save();

        return redirect('/contact')->with("success", "Votre message a été correctement envoyé.");

    }



    public function delete(Contact $contact) {
        $firstname = $contact->firstname;
        $lastname = $contact->lastname;
        $contact->delete();

        return redirect('/admin/adminContact')->with("success", "Le message de {$firstname} {$lastname} a été supprimé avec succès !");

    }


}


