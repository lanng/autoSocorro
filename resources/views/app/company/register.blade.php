@extends('app.layouts.basic')
@section('title', $title)
@section('content')
    <div class="container-md justify-content-md-center">
        <h1 align="center">Cadastro de Empresas</h1>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-body">
                        <form method="post" action="{{ route('app.company.create') }}">
                            @csrf
                            <fieldset>
                                <div class="form-floating mb-3">
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" type="text" placeholder="Nome Empresa" />
                                    <label for="company">Nome da Empresa</label>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" type="text" placeholder="CNPJ" />
                                    <label for="cnpj">CNPJ Empresa</label>
                                    @error('cnpj')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" type="text" placeholder="Cidade" />
                                    <label for="city">Cidade da Empresa</label>
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if(isset($message) && $message != '')
                                    <div class="container-md">
                                        <p class="text-success" align="center">{{ $message }}</p>
                                    </div>
                                @endif
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
