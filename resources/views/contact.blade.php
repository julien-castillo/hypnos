@extends("layouts.master")

@section("contact")
    <div class="my-3 p-3 bg-body rounded shadow-sm" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <h3 class="border-bottom pb-2 mb-4">Formulaire de contact</h3>

        <div class="mt-4">
            @if(session()->has("success"))
                <div class="alert alert-success">
                    <h3>{{ session()->get('success') }}</h3>
                </div>
            @endif

            @if ($errors->any())
                <div class=" alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form style="width: 65%;" method="post" action="" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="_method" value="put">

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
                    <label for="object" class="form-label">Sujet :</label>
                    <select class="form-select" name="object">
                        <option value="1">Je souhaite poser une réclamation</option>
                        <option value="2">Je souhaite commander un service supplémentaire</option>
                        <option value="3">Je souhaite en savoir plus sur une suite</option>
                        <option value="4">J'ai un souci avec cette application</option>
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
@endsection
