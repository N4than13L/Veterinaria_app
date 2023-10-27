@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Factura a imprimir') }}</h3>
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
                                <th scope="col">Moto</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">{{ $bill->id }}</td>
                                <td scope="row">{{ $bill->attendedby }}</td>
                                <td scope="row">{{ $bill->client->name }}</td>
                                <td scope="row">{{ $bill->treatment->name }}</td>
                                <td scope="row">RD$ {{ $bill->treatment->amount }}</td>
                                <td scope="row">{{ $bill->created_at }}</td>

                                <td scope="row">
                                    <a target="_Blank" href="{{ route('bill.printpdf', ['id' => $bill->id]) }}"
                                        class="btn btn-primary btn-sm m-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
