<?php

namespace App\Http\Controllers;

use App\Models\plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlateController extends Controller
{
    public function register(){
        return view('app.plate.register', ['title' => 'Cadastro Placas']);
    }

    public function listPlates(){
        $plates = DB::table('plates')->select('*')->paginate(5);
        return view('app.plate.list', ['title' => 'Listagem Placas', 'plates' => $plates]);
    }

    public function formValidate(Request $request, plate $plate=null){
        $rules = [
            'plate' => 'required|min:8|max:8|unique:plates,plate',
            'city' => 'max:30'
        ];

        if (!empty($plate)){
            $rules['plate'] = 'required|min:8|max:8|unique:plates,plate,'.$plate->id;
        }

        $feedback = [
            'plate.required' => 'O campo placa é obrigatório!',
            'plate.min' => 'O campo placa deve ser preenchido corretamente (XXX-0000)',
            'plate.max' => 'O campo placa deve ser preenchido corretamente (XXX-0000)',
            'plate.unique' => 'Esta placa já está cadastrada no sistema!',
            'city.max' => 'O campo cidade deve conter no máximo 30 caracteres ',

        ];
        $request->validate($rules, $feedback);
    }

    public function createPlate(Request $request){
        $message = '';
        if ($request->input('_token') != ''){
            $this->formValidate($request);
            DB::table('plates')->insert(['plate' => $request->get('plate'), 'city' => $request->get('city')]);
            $message = 'Placa adicionada com sucesso!';
        } else {
            $message = 'Erro no cadastro.';
        }

        return redirect()->route('app.plates')->with('status', $message);
    }

    public function edit($id)
    {
        $plate = plate::findOrFail($id);
        return view('app.plate.edit', ['plate' => $plate, 'title' => 'Editar Placa']);
    }

    public function update(Request $request, $id)
    {
        $plate = plate::findOrFail($id);
        $this->formValidate($request, $plate);
        $plate->plate = $request->input('plate');
        $plate->city = $request->input('city');
        $plate->update();

        return redirect()->route('app.plates')->with('status', 'Placa Alterada com sucesso!');
    }

    public function delete($id)
    {
        $plate = DB::table('plates')->select('*')->where('id', '=', $id);
        $plate->delete();
        return redirect()->route('app.plates')->with('status', 'Placa Excluída com Sucesso!');
    }
}
