<?php

namespace App\Http\Controllers;

use App\Models\insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsuranceController extends Controller
{
    public function register(){
        return view('app.insurance.register', ['title' => 'Cadastro Seguradoras']);
    }

    public function list(){
        $insurances = DB::table('insurances')->select('*')->paginate(5);
        return view('app.insurance.list', ['title' => 'Listagem Seguradoras', 'insurances' => $insurances]);
    }

    public function formValidate(Request $request, insurance $insurance=null){
        $rules = [
            'name' => 'required|min:3|max:20',
            'cnpj' => 'max:14|unique:insurances,cnpj'
        ];

        //Modificando regra para na hora de atualizar o registro ele ignorar o proprio cnpj do registro que sera modificado.
        if (!empty($insurance)){
            $rules['cnpj'] = 'required|min:14|max:14|unique:insurances,cnpj,'.$insurance->id;
        }
        $feedback = [
            'name.required' => 'O campo nome é obrigatório!',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 20 caracteres',
            'cnpj.max' => 'O campo CNPJ deve ser preenchido corretamente sem pontos (11111111000115)',
            'cnpj.unique' => 'Já existe uma seguradora com este cnpj cadastrado!',
        ];
        $request->validate($rules, $feedback);
    }

    public function create(Request $request){
        $message = '';
        if ($request->input('_token') != ''){
            $this->formValidate($request);
            DB::table('insurances')->insert(['name' => $request->get('name'), 'cnpj' => $request->get('cnpj')]);
            $message = 'Seguradora adicionada com sucesso!';
        } else {
            $message = 'Erro no cadastro.';
        }

        return redirect()->route('app.insurances')->with('status', $message);
    }

    public function edit($id)
    {
        $insurance = insurance::findOrFail($id);
        return view('app.insurance.edit', ['insurance' => $insurance, 'title' => 'Editar Seguradora']);
    }

    public function update(Request $request, $id)
    {
        $insurance = insurance::findOrFail($id);
        $this->formValidate($request, $insurance);
        $insurance->name = $request->input('name');
        $insurance->cnpj = $request->input('cnpj');
        $insurance->update();

        return redirect()->route('app.insurances')->with('status', 'Seguradora Alterada com sucesso!');
    }

    public function delete($id)
    {
        $insurance = DB::table('insurances')->select('*')->where('id', '=', $id);
        $insurance->delete();
        return redirect()->route('app.insurances')->with('status', 'Seguradora Excluída com Sucesso!');
    }
}
