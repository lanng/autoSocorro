@extends('app.layouts.basic')
@section('title', $title)
@section('content')
    <div class="container-md justify-content-md-center">
        <h1 align="center">Lista de Placas</h1>
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <button type="button" class="btn btn-outline-info"><a class="link-dark" href="{{ route('app.plates-register') }}"><i class="fa-solid fa-plus"></i></a></button>
        <table class="table table-responsive-md">
            <thead>
            <tr>
                <th scope="col">Placa</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($plates as $plate)
                <tr>
                    <td>{{ $plate->plate }}</td>
                    <td class="btn-datatable"><a class="btn btn-outline-primary" href="{{ route('app.plate.edit', $plate->id) }}"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="btn-datatable"><a class="btn btn-outline-danger" onclick="return confirm('Deseja realmente excluir a placa?')" href="{{ route('app.plate.delete', $plate->id) }}"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="{{ $plates->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                @for($i = 1; $i <= $plates->lastPage(); $i++)
                    <li class="page-item"><a class="page-link" href="{{ $plates->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $plates->nextPageUrl()  }}"><i class="fa-solid fa-angle-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
