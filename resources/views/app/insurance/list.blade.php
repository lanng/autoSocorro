@extends('app.layouts.basic')
@section('title', $title)
@section('content')
    <div class="container-md justify-content-md-center">
        <h1 align="center">Lista de Seguradoras</h1>
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <button type="button" class="btn btn-outline-info"><a class="link-dark" href="{{ route('app.insurance.register') }}"><i class="fa-solid fa-plus"></i></a></button>
        <table class="table table-responsive-md">
            <thead>
            <tr>
                <th scope="col">Seguradora</th>
                <th scope="col">CNPJ</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($insurances as $insurance)
                <tr>
                    <td>{{ $insurance->name }}</td>
                    <td>{{ $insurance->cnpj }}</td>
                    <td class="btn-datatable"><a class="btn btn-outline-primary" href="{{ route('app.insurance.edit', $insurance->id) }}"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="btn-datatable"><a class="btn btn-outline-danger" onclick="return confirm('Deseja realmente excluir a seguradora?')" href="{{ route('app.insurance.delete', $insurance->id) }}"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="{{ $insurances->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                @for($i = 1; $i <= $insurances->lastPage(); $i++)
                    <li class="page-item"><a class="page-link" href="{{ $insurances->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $insurances->nextPageUrl()  }}"><i class="fa-solid fa-angle-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
