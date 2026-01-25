@extends('plantilla')

@section('titol', 'Llistat posts')

@section('contingut')
    <h1 class="my-4">Llistat de posts</h1>

    @forelse($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $post->titol }} 
                    @if($post->user)
                        <small class="text-muted">({{ $post->user->login }})</small>
                    @endif
                </h5>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">Veure</a>
            </div>
        </div>
    @empty
        <p>No hi ha posts disponibles.</p>
    @endforelse

    <div class="mt-3">
        {{ $posts->links() }}
    </div>
@endsection