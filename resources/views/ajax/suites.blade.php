<option value="">-- Sélectionner une suite --</option>

@if (isset($suites))
    @if($suites->count() < 1)
        <option value="">-- Aucune suite disponible --</option>
    @else
        @foreach($suites as $suite)
            <option value="{{ $suite->id }}" {{ $selected_suite == $suite->id ? 'selected' : '' }}>{{ $suite->name }}</option>
        @endforeach
    @endif
@endif