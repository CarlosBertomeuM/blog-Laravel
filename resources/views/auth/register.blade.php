@extends('plantilla')

@section('titol', 'Registre')

@section('contingut')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <h1 class="mb-4">Registre</h1>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="login" class="form-label">Usuari</label>
                    <input type="text" class="form-control @error('login') is-invalid @enderror" 
                           id="login" name="login" value="{{ old('login') }}">
                    @error('login')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contrasenya</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contrasenya</label>
                    <input type="password" class="form-control" 
                           id="password_confirmation" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-primary w-100">Registrar-se</button>
                
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Ja tens compte? Inicia sessió</a>
                </div>
            </form>
        </div>
    </div>
@endsection