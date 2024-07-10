<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaStoreRequest;
use App\Models\Cadastrador;
use App\Models\Pessoa;
use Exception;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $cadastradores = Cadastrador::where('ativo', Cadastrador::ATIVO)->get();

            return view('pessoa.create', compact('cadastradores'));
        }
        catch (\Exception $ex) {
            return redirect()->back()->with('erro', 'Entre em contato com o administrador do sistema.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaStoreRequest $request)
    {
        try{

            Pessoa::create($request->validated());

            return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso');

        }
        catch (\Exception $ex) {
            return redirect()->back()->with('erro', 'Entre em contato com o administrador do sistema.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }
}
