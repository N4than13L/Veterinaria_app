@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Listado de clientes') }}</h3>
                        <a class="btn btn-success" href="{{ route('client.add') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">apellido</th>
                                <th scope="col">telefono</th>
                                <th scope="col">direccion</th>
                                <th scope="col">Mascota</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $clients)
                                <tr>
                                    <td scope="row">{{ $clients->id }}</td>
                                    <td scope="row">{{ $clients->name }}</td>
                                    <td scope="row">{{ $clients->surname }}</td>
                                    <td scope="row">{{ $clients->phone }}</td>
                                    <td scope="row">{{ $clients->address }}</td>
                                    <td scope="row">{{ $clients->animals->name }}</td>
                                    <td scope="row">{{ $clients->created_at }}</td>
                                    <td scope="row">
                                        <a href="{{ route('client.edit', ['id' => $clients->id]) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('client.delete', ['id' => $clients->id]) }}"
                                            class="btn btn-danger btn-sm ">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>

                    <div class="clearfix">
                        {{ $client->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
