@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">
                        <h2 class="text-center">Agrega tus Especies</h2>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('treatment.update', $treatment->id) }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $treatment->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- obs --}}
                            <div class="row mb-3">
                                <label for="obs"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Observaciones') }}</label>

                                <div class="col-md-6">

                                    <textarea value="{{ $treatment->name }}" id="obs" class="form-control @error('obs') is-invalid @enderror"
                                        name="obs" value="{{ old('obs') }}" required autocomplete="obs" autofocus></textarea>

                                    @error('obs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Monto --}}
                            <div class="row mb-3">
                                <label for="amount"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Monto') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" value="{{ $treatment->amount }}"
                                        class="form-control @error('amount') is-invalid @enderror" name="amount"
                                        value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- animals --}}
                            <div class="row mb-3">
                                <label for="animal"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mascota') }}</label>

                                <div class="col-md-6">
                                    <select name="animal" class="form-select" aria-label="Default select example">
                                        <option>Selecciona la Mascota</option>
                                        @foreach ($animal as $animals)
                                            <option selected value="{{ $animals->id }}">
                                                {{ $animals->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            {{-- vacuna --}}
                            <div class="row mb-3">
                                <label for="vaccine"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Vacuna') }}</label>

                                <div class="col-md-6">
                                    <select name="vaccine" class="form-select" aria-label="Default select example">
                                        <option>Selecciona la Mascota</option>
                                        @foreach ($vaccine as $vaccines)
                                            <option selected value="{{ $vaccines->id }}">
                                                {{ $vaccines->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa-solid fa-file-pen"></i>
                                        Editar Tratamiento
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
