@extends('site.layouts.basic')
@section('title', $title)
@section('content')
    <h1 align="center">Login</h1>
    <form style="max-width: 600px; margin: 100px auto" method="post" action="{{ route('site.login') }}">
        @csrf
        <fieldset>
            <legend>Insira seus dados</legend>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">E-mail cadastrado</label>
                <input type="email" class="form-control @error('user') is-invalid @enderror" value="{{ old('user') }}" name="user" placeholder="Insira o seu email">
                @error('user')
                    <div class="invalid-feedback">{{ $message }}</div>
                </div>
                @enderror
            <div class="form-group has-sucess">
                <label for="exampleInputPassword1" class="form-label mt-4">Senha</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Insira sua senha">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary d-flex" style="margin: 20px auto;">Enviar</button>
            <button type="submit" class="btn btn-link d-flex" style="margin: 20px auto;">Esqueci a senha</button>
        </fieldset>
        @if(isset($error) && $error != '' && count($errors) == 0)
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }}
            </div>
        @endif
    </form>
@endsection
