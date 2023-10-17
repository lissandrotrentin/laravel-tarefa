<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroValidacao;
use App\Http\Requests\Loginvalidacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginindex(){

        if(auth()->check()){
            return redirect()->route('tarefas.listagem');
        }

        return view('login');

    }

    public function loginstore(LoginValidacao $request){


        $dados = $request->only('name', 'password');

        $authenticated = Auth::attempt($dados);

        if(!$authenticated){
            return redirect()->route('login.index')->withErrors(['error' => 'email ou senha invalidos']);
        }

        return redirect()->route('login.index');
    
        

    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function cadastroindex(){
        return view('cadastro');
    }

    public function cadastro(CadastroValidacao $request, User $user){

        $dados = $request->only('name', 'email', 'password');
        $user->create($dados);
        $authenticated = Auth::attempt($dados);

        return redirect()->route('login.index');
        
    }
    
}




