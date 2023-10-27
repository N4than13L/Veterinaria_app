@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">
                        <h2 class="text-center">Agregar mascotas</h2>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('animals.save') }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- age --}}
                            <div class="row mb-3">
                                <label for="age"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Edad') }}</label>

                                <div class="col-md-6">
                                    <input id="age" type="number"
                                        class="form-control @error('age') is-invalid @enderror" name="age"
                                        value="{{ old('age') }}" required autocomplete="age" autofocus>

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- birth --}}
                            <div class="row mb-3">
                                <label for="birth"
                                    class="col-md-4 col-form-label text-md-end">{{ __('fecha de nacimiento') }}</label>

                                <div class="col-md-6">
                                    <input id="birth" type="text"
                                        class="form-control @error('birth') is-invalid @enderror" name="birth"
                                        value="{{ old('birth') }}" required autocomplete="birth" autofocus>

                                    @error('birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- especie --}}
                            <div class="row mb-3">
                                <label for="species"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Especie de la mascota') }}</label>

                                <div class="col-md-6">
                                    <select name="species" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona la especie</option>
                                        @foreach ($specie as $species)
                                            <option value="{{ $species->id }}">
                                                {{ $species->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                        Guardar Mascota
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
