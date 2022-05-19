<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function index(){
        return view('app.driver-list', ['title' => 'Listagem Motoristas']);
    }

    public function createDriver(Request $request){
        $message = '';
        if ($request->input('_token') != ''){
            $rules = [
                'name' => 'required|min:3|max:20',
                'cpf' => 'required|min:11|max:11'
            ];
            $feedback = [
                'required' => 'O campo :attribute é obrigatório!',
                'name.min' => 'O nome informado deve ter mais que 3 caracteres',
                'name.max' => 'O nome informado não deve ter mais que 20 caracteres',
                'cpf.max' => 'Favor preencher o campo CPF corretamente, somente números',
                'cpf.min' => 'Favor preencher o campo CPF corretamente, somente números'

            ];
            $request->validate($rules, $feedback);
            DB::table('drivers')->insert(['name' => $request->get('name'), 'cpf' => $request->get('cpf')]);
            $message = 'Motorista adicionado com sucesso!';
        } else {
            $message = 'Erro no cadastro.';
        }
        return view('app.driver-register', ['title' => 'Cadastro Motoristas', 'message' => $message]);
    }
}
