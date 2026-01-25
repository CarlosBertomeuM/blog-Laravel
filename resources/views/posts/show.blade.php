@extends('plantilla')

@section('titol', 'Fitxa post')

@section('contingut')
    <h1 class="my-4">{{ $post->titol }}</h1>
    
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $post->contingut }}</p>
            <p class="text-muted"><small>Creat el: {{ $post->created_at->format('d/m/Y H:i') }}</small></p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Tornar al llistat</a>
        
        @auth
            @if($post->usuari_id === auth()->id())
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Estàs segur que vols esborrar aquest post?')">Esborrar</button>
                </form>
            @endif
        @endauth
    </div>
@endsection