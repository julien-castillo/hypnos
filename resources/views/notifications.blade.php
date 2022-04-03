@if ($errors->any())
    <div class="notifications section error">
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    </div>
@endif
@if (session('success'))
    <div class="notifications section success">
        <p class="success">{{ session('success') }}</p>
    </div>
@endif

@if (session('info'))
    <div class="notifications section success">
        <p class="success">{{ session('info') }}</p>
    </div>
@endif
