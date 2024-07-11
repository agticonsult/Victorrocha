<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        try {
            return view('auth.login');
        }
        catch (\Exception $ex) {
            // $ex->getMessage();
            return redirect()->back()->with('erro', 'Ocorreu um erro ao logar no sistema.');
        }
    }

    public function autenticacao(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('E-mail ou senha de usuário com dados incorretos');
        };

        $usuario = User::where('email', '=', $request->email)
            ->select('id', 'email', 'ativo')
            ->where('ativo', '=', 1)
        ->first();

        if($usuario != null){
            return redirect('/perfil');
        }
        else{
            return redirect()->back()->with('erro', 'Usuário inexistente ou inativado.');
        }

    }
}
