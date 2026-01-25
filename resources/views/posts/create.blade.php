@extends('plantilla')

@section('titol', 'Nou post')

@section('contingut')
    <h1 class="my-4">Nou post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="titol" class="form-label">Títol</label>
            <input type="text" class="form-control @error('titol') is-invalid @enderror" id="titol" name="titol" value="{{ old('titol') }}">
            @error('titol')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contingut" class="form-label">Contingut</label>
            <textarea class="form-control @error('contingut') is-invalid @enderror" id="contingut" name="contingut" rows="5">{{ old('contingut') }}</textarea>
            @error('contingut')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
@endsection