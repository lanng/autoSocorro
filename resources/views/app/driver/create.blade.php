@extends('app.layouts.basic')
@section('title', $title)
@section('content')
    <div class="container-md justify-content-md-center">
        <h1 align="center">Cadastro de Motoristas</h1>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-body">
{{--                        asd--}}
                        <form method="post" action="{{ route('app.drivers.create')  }}">
                        @csrf
                        <fieldset>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" type="text" placeholder="Nome" />
                                <label for="name">Nome do Motorista</label>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf') }}" type="text" placeholder="CPF" />
                                <label for="cpf">CPF do Motorista</label>
                                @error('cpf')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end mt-4 mb-0">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
