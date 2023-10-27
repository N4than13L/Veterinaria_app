@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Listado de tratamientos') }}</h3>
                        <a class="btn btn-success" href="{{ route('treatment.add') }}"><i class="fas fa-plus"></i></a>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Observaciones</th>
                                <th scope="col">Monto</th>

                                <th scope="col">Mascota</th>
                                <th scope="col">Vacuna</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($treatment as $treatments)
                                @if (Auth::user()->id == $treatments->users_id)
                                    <tr>
                                        <td scope="row">{{ $treatments->id }}</td>
                                        <td scope="row">{{ $treatments->name }}</td>
                                        <td scope="row">{{ $treatments->observations }}</td>
                                        <td scope="row">RD$ {{ $treatments->amount }}</td>
                                        <td scope="row">{{ $treatments->animals->name }}</td>
                                        <td scope="row">{{ $treatments->vaccine->name }}</td>
                                        <td scope="row">{{ $treatments->created_at }}</td>

                                        <td scope="row">
                                            <a href="{{ route('treatment.edit', ['id' => $treatments->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('treatment.delete', ['id' => $treatments->id]) }}"
                                                class="btn btn-danger btn-sm ">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                    </table>

                    <div class="clearfix">
                        {{ $treatment->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
