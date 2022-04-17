@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <h3 class="border-bottom pb-2 mb-4">Formulaire de contact</h3>

        <div class="mt-4">
{{--            @if(session()->has("success"))--}}
{{--                <div class="alert alert-success">--}}
{{--                    <h3>{{ session()->get('success') }}</h3>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if ($errors->any())--}}
{{--                <div class=" alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <form style="width: 45%;" method="post" action="{{ route('contact.store') }}" enctype="multipart/form-data">

                @csrf
{{--                <input type="hidden" name="_method" value="put">--}}

                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" value="" name="lastname" required>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" value="" name="firstname" required>

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Objet :</label>
                    <select class="form-select" name="subject" required>
                        <option value="">Merci de selectionner un sujet</option>
                        <option value="Réclamation">Je souhaite poser une réclamation</option>
                        <option value="Service supplémentaire">Je souhaite commander un service supplémentaire</option>
                        <option value="Demande de renseignements">Je souhaite en savoir plus sur une suite</option>
                        <option value="Problème avec l'application">J'ai un souci avec cette application</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea rows="4" cols="50" class="form-control" value="" name="message" required></textarea>
                </div>


                <a href="" class="btn btn-danger">Annuler / Retour</a>
                <button type="submit" class="btn btn-success">Envoyer</button>
            </form>

        </div>
    </div>
    @include("layouts.footer")
@endsection
