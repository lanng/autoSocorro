@extends('app.layouts.basic')
@section('title', $title)
@section('content')
    <div class="container-md justify-content-md-center">
        <h1 align="center">Lista de Motoristas</h1>
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <button type="button" class="btn btn-outline-info"><a class="link-dark" href="{{ route('app.driver-register') }}"><i class="fa-solid fa-user-plus"></i></a></button>
        <table class="table table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                    <tr>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->cpf }}</td>
                        <td class="btn-datatable"><a class="btn btn-outline-primary" href="{{ route('app.driver.edit', $driver->id) }}"><i class="fa-solid fa-pen"></i></a></td>
                        <td class="btn-datatable"><a class="btn btn-outline-danger" onclick="return confirm('Deseja realmente excluir o motorista?')" href="{{ route('app.driver.delete', $driver->id) }}"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="{{ $drivers->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                @for($i = 1; $i <= $drivers->lastPage(); $i++)
                    <li class="page-item"><a class="page-link" href="{{ $drivers->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $drivers->nextPageUrl()  }}"><i class="fa-solid fa-angle-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
