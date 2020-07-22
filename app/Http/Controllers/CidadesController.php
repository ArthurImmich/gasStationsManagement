<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cidades;

class CidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = cidades::all();
        return view('cidades/index', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    public function create()
    {
        return view('cidades/create');
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
        'nome' => 'required',
        'uf' => 'required|min:2|max:2',
        'cep' => 'required|min:8|max:8'
        ];
        $msgs = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres",
        "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres"
        ];
        //faz a validação dos dados recebidos via formulário
        $request->validate($regras, $msgs);
        //receber os dados do formulário e gravar na tabela cidades
        cidades::create($request->all());
        //redireciona para a página index da cidades
        return redirect('cidades')->with('success','Combustivel cadastrado com sucesso');
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
    public function edit($id)
    {
        $cidades = cidades::find($id);
        return view('cidades/edit', compact("cidades"));
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
        $cidades = cidades::find($id);
        $cidades->update($request->all());
        return redirect('cidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidades = cidades::find($id);
        $cidades->delete();
        return redirect('cidades');
    }
}
