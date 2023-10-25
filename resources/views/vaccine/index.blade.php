@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Listado de vacunas') }}</h3>
                        <a class="btn btn-success" href="{{ route('vaccine.add') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">Tipo</th>
                                <th scope="col">Efectos</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vaccine as $vaccines)
                                <tr>
                                    <td scope="row">{{ $vaccines->id }}</td>
                                    <td scope="row">{{ $vaccines->name }}</td>
                                    <td scope="row">{{ $vaccines->type }}</td>
                                    <td scope="row">{{ $vaccines->effects }}</td>
                                    <td scope="row">{{ $vaccines->created_at }}</td>

                                    <td scope="row">
                                        <a href="{{ route('vaccine.edit', ['id' => $vaccines->id]) }}"
                                            class="btn btn-warning btn-sm m-2">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('vaccine.delete', ['id' => $vaccines->id]) }}"
                                            class="btn btn-danger btn-sm m-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>

                    <div class="clearfix">
                        {{ $vaccine->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
