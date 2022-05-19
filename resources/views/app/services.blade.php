@extends('app.layouts.basic')
@section('title', $title)
@section('content')
    <div class="container-md justify-content-md-center">
        <h1 align="center">Lançamento de serviços</h1>
        <form action="" method="post">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="serviceNumber" type="text" placeholder="Servico" />
                                    <label for="serviceNumber">Numero de serviço</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="origin" type="text" placeholder="origem"/>
                                    <label for="origin">Origem</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="destination" type="text" placeholder="destino" />
                                    <label for="destination">Destino</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="serviceDate" type="date" placeholder="data" />
                                    <label for="serviceDate">Data</label>
                                </div>
                                <div class="d-flex justify-content-end mt-4 mb-0">
                                    <a class="btn btn-success" href="#">Cadastrar</a>
                                </div>
{{--                               Demais campos terão relacionamento com outras tabelas, vão ser implementados apos a criação das outras views --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
