<?php
use App\cidades;
use App\postos;
use App\combustiveis;

?>
@extends('layouts.layout')
@section('title')
Postos
@endsection
@if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
@endif
@section('content')

            <div class="bg-light shadow col-9 mx-auto mt-5 rounded">
            
            <div class="d-flex justify-content-between p-3">
                <h4>Relatório de postos</h4>
                <p>Fazer <a href="login">Login</a></p>
                <form method="GET" class="d-flex col-3">
                    <select scope="row" name="id_cidade" class="form-control">
                        @foreach(($cidades = cidades::all()) as $cidade)
                            <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-dark btn-md my-0 ml-sm-2" type="submit">Pesquisar</button>
                </form>
                <?php 
                if (isset($_GET['id_cidade'])){
                    $postos = postos::where('id_cidade', $_GET['id_cidade'])->get();
                }else {
                    $postos = postos::all();
                }
                ?>
            </div>
            <table class="table table-hover">
                
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Razão Social</th>
                        <th scope="col">Nome Fantasia</th>
                        <th scope="col">Bandeira</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Id Cidade</th>
                        <th scope="col">Relatório</th>
                    </tr>

                    @foreach ($postos as $posto)
                    <tr>
                        <td scope="row">{{$posto->id}}</td>
                        <td scope="row">{{$posto->cnpj}}</td>
                        <td scope="row">{{$posto->razao_social}}</td>
                        <td scope="row">{{$posto->nome_fantasia}}</td>
                        <td scope="row">{{$posto->bandeira}}</td>
                        <td scope="row">{{$posto->endereco}}</td>
                        <td scope="row">{{$posto->bairro}}</td>
                        <td scope="row">{{$posto->id_cidade}}</td>
                        <td scope="row">
                            <form method="GET">
                                <button class="btn btn-primary btn-xs" name="postoid" value="{{$posto->id}}">Relatório</button>  
                            </form>
                        </td>
                    </tr>

                    @if (isset($_GET['postoid']) && $_GET['postoid'] == $posto->id)
                        @foreach ($combustiveis = combustiveis::where('id_posto', $posto->id)->get() as $combust)
                            <tr>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td scope="col"><strong>Tipo: </strong>{{ $combust->tipo }}</td>
                                <td scope="col"><strong>Data Coleta: </strong>{{ $combust->data_coleta }}</td>
                                <td scope="col"><strong>Preço Venda: </strong>{{ $combust->preco_venda }}</td>
                            </tr>
                        @endforeach
                    @endif

                    @endforeach
                </table>

            </div>
@endsection