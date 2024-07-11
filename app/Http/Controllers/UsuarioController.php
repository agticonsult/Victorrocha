<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function perfil()
    {
        try{
            $usuario = Auth::user();

            return view('home.home', compact('usuario'));
        }
        catch (\Exception $ex) {
            return redirect()->back()->with('erro', 'Entre em contato com o administrador do sistema.');
        }
    }
}
