<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\postos;

class PostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postos = postos::all();
        return view('postos/index', compact('postos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postos/create');
    }

    public function show($id)
    {
        //
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
        'cnpj' => 'required|min:14|max:14',
        'razao_social' => 'required',
        'nome_fantasia' => 'required',
        'bandeira' => 'required',
        'endereco' => 'required',
        'bairro' => 'required',
        'id_cidade' => 'required'
        ];
        $msgs = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres",
        "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres"
        ];
        //faz a validação dos dados recebidos via formulário
        $request->validate($regras, $msgs);
        //receber os dados do formulário e gravar na tabela cursos
        postos::create($request->all());
        //redireciona para a página index dos cursos
        return redirect('postos')->with('success','Posto cadastrado com sucesso');
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
        $postos = postos::find($id);
        return view('postos/edit', compact("postos"));
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
        $postos = postos::find($id);
        $postos->update($request->all());
        return redirect('postos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postos = postos::find($id);
        $postos->delete();
        return redirect('postos');
    }
}
