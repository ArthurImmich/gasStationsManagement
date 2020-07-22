<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\combustiveis;

class CombustiveisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combustiveis = combustiveis::all();
        return view('combustiveis/index', compact('combustiveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('combustiveis/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //define as regras e mensagens de validação
        $regras = [
        'tipo' => 'required',
        'data_coleta' => 'required',
        'preco_venda' => 'required',
        'id_posto' => 'required'
        ];
        $msgs = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!"
        ];
        //faz a validação dos dados recebidos via formulário
        $request->validate($regras, $msgs);
        //receber os dados do formulário e gravar na tabela cursos
        combustiveis::create($request->all());
        //redireciona para a página index dos cursos
        return redirect('combustiveis')->with('success','Combustivel cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $combustiveis = combustiveis::find($id);
        return view('combustiveis/edit', compact("combustiveis"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $combustiveis = combustiveis::find($id);
        $combustiveis->update($request->all());
        return redirect('combustiveis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $combustiveis = combustiveis::find($id);
        $combustiveis->delete();
        return redirect('combustiveis');
    }
}
