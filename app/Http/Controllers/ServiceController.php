<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index (){
        return view('app.services', ['title' => 'Lançar Serviços']);
    }
    public function CreateService(Request $request){

    }
}
