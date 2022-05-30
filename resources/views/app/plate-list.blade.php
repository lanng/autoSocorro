@extends('app.layouts.basic')
@section('title', $title)
@section('content')
    <div class="container-md justify-content-md-center">
        <h1 align="center">Lista de Placas em Sistema</h1>
        <button type="button" class="btn btn-outline-info"><a class="link-dark" href="{{ route('app.plates-register') }}">Inserir nova placa</a></button>
        <table class="table table-responsive-md">
            <thead>
            <tr>
                <th scope="col">Placa</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="">
            @foreach($plates as $plate)
                <tr>
                    <td>{{ $plate->plate }}</td>
                    <td class="btn-datatable"><a href="#">Editar</a></td>
                    <td class="btn-datatable"><a href="#">Excluir</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="btn container-fluid">
            <a href="{{ $plates->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a>
            <a href="{{ $plates->nextPageUrl() }}"><i class="fa-solid fa-angle-right"></i></a>
        </div>
    </div>
@endsection
