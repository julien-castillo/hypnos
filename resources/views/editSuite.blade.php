@extends("layouts.master")

@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="update border-bottom pb-2 mb-4">Modification de la suite : {{ $suite->name }}</h3>

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

            <form style="width: 65%;" method="post" action="{{ route('manager.suite.update', ['suite'=>$suite->id]) }}"
                  enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="_method" value="put">

                <div class="mb-3">
                    <p>Cover :</p>
                    @csrf

                    <img src="{{ $suite->getCoverImageUrl() }}" class="cover" alt="Photo mise en avant de la suite">
                    <br>
                </div>
                <div>
                    <p>Images: </p>
                    @foreach($suite->images as $img)
                        <div class="old-suite-image" id="image-{{ $img->id }}" style="display: inline-block">
                            <img src="{{ $img->getUrl() }}" class="suites-images" alt="Photo de la suite">
                            <span class="croix" data-image-id="{{ $img->id }}">x</span>
                            <input type="hidden" name="oldImages[]" value="{{ $img->id }}"/>
                        </div>
                    @endforeach

                    <input type="hidden" id="oldImagesDeletedClone" name="oldImagesDeleted[]" value="clone"/>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la suite</label>
                    <input type="text" class="form-control" value="{{ $suite->name }}" name="name" required>

                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="number" class="form-control" value="{{ $suite->price }}" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" value="{{ $suite->description }}" name="description"
                           required>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="cover">
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Images</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="images[]"
                           multiple>
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('manager.index') }}" class="btn btn-danger">Annuler / Retour</a>
            </form>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        (function ($) {

            $('span.croix').on('click', function () {
                var imageId = $(this).attr('data-image-id');
                var clone = $('#oldImagesDeletedClone');
                var clonedElement = clone.clone();

                $('#image-' + imageId).fadeOut(400, function () {
                    $(this).remove();
                });
                clonedElement.removeAttr('id').attr('value', imageId).insertAfter(clone);
            })

        }(jQuery));
    </script>
@endpush
