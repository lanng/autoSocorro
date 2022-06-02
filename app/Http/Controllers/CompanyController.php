<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function register(){
        return view('app.company.register', ['title' => 'Cadastro Empresas']);
    }

    public function list(){
        $companies = DB::table('companies')->select('*')->paginate(5);
        return view('app.company.list', ['title' => 'Listagem Empresas', 'companies' => $companies]);
    }

    public function formValidate(Request $request){
        $rules = [
            'name' => 'required|min:3|max:20',
            'cnpj' => 'required|min:14|max:14|unique:companies,cnpj',
            'city' => 'max:30'
        ];
        $feedback = [
            'name.required' => 'O campo nome é obrigatório!',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 20 caracteres',
            'cnpj.required' => 'O campo CNPJ é obrigatório!',
            'cnpj.max' => 'O campo CNPJ deve ser preenchido corretamente sem pontos (11111111000115)',
            'cnpj.min' => 'O campo CNPJ deve ser preenchido corretamente sem pontos (11111111000115)',
            'cnpj.unique' => 'Já existe uma empresa cadastrada com este cnpj',
            'city.max' => 'O campo ciddade deve ter no máximo 30 caracteres'
        ];
        $request->validate($rules, $feedback);
    }

    public function create(Request $request){
        $message = '';
        if ($request->input('_token') != ''){
            $this->formValidate($request);
            DB::table('companies')->insert(['name' => $request->get('name'), 'cnpj' => $request->get('cnpj'), 'city' => $request->get('city')]);
            $message = 'Empresa adicionada com sucesso!';
        } else {
            $message = 'Erro no cadastro.';
        }

        return redirect()->route('app.companies')->with('status', $message);
    }

    public function edit($id)
    {
        $company = company::findOrFail($id);
        return view('app.company.edit', ['company' => $company, 'title' => 'Editar Empresa']);
    }

    public function update(Request $request, $id)
    {
        $company = company::findOrFail($id);
        $this->formValidate($request);
        $company->name = $request->input('name');
        $company->cnpj = $request->input('cnpj');
        $company->city = $request->input('city');
        $company->update();

        return redirect()->route('app.companies')->with('status', 'Empresa Alterada com sucesso!');
    }

    public function delete($id)
    {
        $company = DB::table('companies')->select('*')->where('id', '=', $id);
        $company->delete();
        return redirect()->route('app.companies')->with('status', 'Empresa Excluída com Sucesso!');
    }
}
