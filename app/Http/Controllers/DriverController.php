<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function register(){
        return view('app.driver.create', ['title' => 'Cadastro Motoristas']);
    }

    public function listDrivers(){
        $drivers = DB::table('drivers')->select('*')->paginate(5);
        return view('app.driver.list', ['title' => 'Listagem Motoristas', 'drivers' => $drivers]);

    }

    public function formValidate(Request $request, driver $driver=null){
        $rules = [
            'name' => 'required|min:3|max:20',
            'cpf' => 'required|min:11|max:11|unique:drivers,cpf'
        ];

        if (!empty($driver)){
            $rules['cpf'] = 'required|min:11|max:11|unique:drivers,cpf,'.$driver->id;
        }

        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'name.min' => 'O nome informado deve ter mais que 3 caracteres',
            'name.max' => 'O nome informado não deve ter mais que 20 caracteres',
            'cpf.max' => 'Favor preencher o campo CPF corretamente, somente números',
            'cpf.min' => 'Favor preencher o campo CPF corretamente, somente números',
            'cpf.unique' => 'Já existe um motorista com este CPF no sistema!'

        ];
        $request->validate($rules, $feedback);
    }

    public function createDriver(Request $request){
        $message = '';
        if ($request->input('_token') != ''){
            $this->formValidate($request);
            DB::table('drivers')->insert(['name' => $request->get('name'), 'cpf' => $request->get('cpf')]);
            $message = 'Motorista adicionado com sucesso!';
        } else {
            $message = 'Erro no cadastro.';
        }
        return redirect()->route('app.drivers')->with('status', $message);
    }

    public function edit($id)
    {
        $driver = driver::findOrFail($id);
        return view('app.driver.edit', ['driver' => $driver, 'title' => 'Editar Motorista']);
    }

    public function update(Request $request, $id)
    {
        $driver = driver::findOrFail($id);
        $this->formValidate($request, $driver);
        $driver->name = $request->input('name');
        $driver->cpf = $request->input('cpf');
        $driver->update();

        return redirect()->route('app.drivers')->with('status', 'Motorista Alterado com sucesso!');
    }

    public function delete($id)
    {
        $driver = DB::table('drivers')->select('*')->where('id', '=', $id);
        $driver->delete();
        return redirect()->route('app.drivers')->with('status', 'Motorista Excluido com Sucesso!');
    }
}
