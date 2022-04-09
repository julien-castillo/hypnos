<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController {

    /**
     * List of contact messages
     */
    public function index() {
        $contacts = Contact::orderBy("created_at", "asc")->paginate(10);
        return view('adminContact', compact("contacts"));
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

        return back()->with("success", "Votre message a été correctement envoyé.");

    }



    public function delete(Contact $contact) {
        $lastname = $contact->lastname;
        $firstname = $contact->firstname;
        $contact->delete();

        return back()->with("successDelete", "Le message de '$firstname' . ' ' . '$lastname' . a été supprimé avec succès !");

    }


}


