@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Listado de facturas') }}</h3>
                        <a class="btn btn-success" href="{{ route('bill.add') }}"><i class="fas fa-plus"></i></a>
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
                                <th scope="col">Atendido por</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Tratamiento</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($bill as $bills)
                                @if (Auth::user()->id == $bills->users_id)
                                    <tr>
                                        <td scope="row">{{ $bills->id }}</td>
                                        <td scope="row">{{ $bills->attendedby }}</td>
                                        <td scope="row">{{ $bills->client->name . ' ' . $bills->client->surname }} </td>
                                        <td scope="row">{{ $bills->treatment->name }}</td>
                                        <td scope="row">RD$ {{ $bills->treatment->amount }}</td>
                                        <td scope="row">{{ $bills->created_at }}</td>

                                        <td scope="row">
                                            <a href="{{ route('bill.viewpdf', ['id' => $bills->id]) }}"
                                                class="btn btn-primary btn-sm m-2">
                                                <i class="fa-solid fa-print"></i>
                                            </a>

                                            <a href="{{ route('bill.edit', ['id' => $bills->id]) }}"
                                                class="btn btn-warning btn-sm m-2">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('bill.delete', ['id' => $bills->id]) }}"
                                                class="btn btn-danger btn-sm m-2">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
