@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Listado de Animales') }}</h3>
                        <a class="btn btn-success" href="{{ route('animals.add') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">edad</th>
                                <th scope="col">cumpleaños</th>
                                <th scope="col">especie</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($animal as $animals)
                                <tr>
                                    <td scope="row">{{ $animals->id }}</td>
                                    <td scope="row">{{ $animals->name }}</td>
                                    <td scope="row">{{ $animals->age }} anios</td>
                                    <td scope="row">{{ $animals->birth }} </td>
                                    <td scope="row">{{ $animals->species->name }} </td>
                                    <td scope="row">{{ $animals->created_at }}</td>

                                    <td scope="row">
                                        <a href="{{ route('animals.edit', ['id' => $animals->id]) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('animals.delete', ['id' => $animals->id]) }}"
                                            class="btn btn-danger btn-sm ">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>

                    <div class="clearfix">
                        {{ $animal->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
