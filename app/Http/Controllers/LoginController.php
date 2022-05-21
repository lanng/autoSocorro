<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(Request $request){

        $error = '';
        switch ($request->get('error')){
            case 1:
                $error = 'Usuário ou senha incorretos!';
                break;
            case 2:
                $error = 'Necessário estar autenticado para acessar essa rota.';
                break;
            case 3:
                $error = 'Usuário não possui permissão para acessar, contate o suporte.';
                break;
            case 99:
                $error = 'Erro interno na aplicação, contate o suporte';
                break;
        }
        return view('site.login', ['title' => 'Login', 'error' => $error]);
    }

    public function loginAuth(Request $request){

        $email = $request->get('user');
        $password = $request->get('password');

        $rules = [
            'user' => 'email|required',
            'password' => 'required'

        ];
        $feedback = [
            'user.email' => 'O email digitado não é válido',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($rules, $feedback);

        //metodo de login com senha salvo em banco apenas para teste mais facilitado, após as implementações básicas das views e outros controllers
        //o sistema vai armazenar apenas a hash da senha e o email cadastrado.
//        $exist = User::where('email', $email)->where('password', $password)->get()->first();
        $exist = DB::table('users')->where('password', '=', $password)->where('email', '=', $email)->get()->first();

        if (isset($exist)) {
            session_start();
            $_SESSION['name'] = $exist->name;
            $_SESSION['email'] = $exist->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    public function logout(){
        session_destroy();
        return redirect(route('site.login'), '302');
    }
}
