@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">
                        <h2 class="text-center">Agregar Factura</h2>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('bill.save') }}">
                            @csrf

                            {{-- attendedby --}}
                            <div class="row mb-3">
                                <label for="attendedby"
                                    class="col-md-4 col-form-label text-md-end">{{ __('attendido por') }}</label>

                                <div class="col-md-6">
                                    <input id="attendedby" type="text"
                                        class="form-control @error('attendedby') is-invalid @enderror" name="attendedby"
                                        value="{{ old('attendedby') }}" required autocomplete="attendedby" autofocus>

                                    @error('attendedby')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- client --}}
                            <div class="row mb-3">
                                <label for="client"
                                    class="col-md-4 col-form-label text-md-end">{{ __('cliente') }}</label>

                                <div class="col-md-6">
                                    <select name="client" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona el cliente</option>
                                        @foreach ($client as $clients)
                                            <option value="{{ $clients->id }}">
                                                {{ $clients->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            {{-- treatment --}}
                            <div class="row mb-3">
                                <label for="treatment"
                                    class="col-md-4 col-form-label text-md-end">{{ __('tratamiento') }}</label>

                                <div class="col-md-6">
                                    <select name="treatment" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona el tratamiento</option>
                                        @foreach ($treatment as $treatments)
                                            <option value="{{ $treatments->id }}">
                                                {{ $treatments->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                        Guardar Factura
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
