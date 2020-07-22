<?php use App\postos; ?>
@extends('layouts.layout')
@section('title')
Combusível
@endsection
@if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
@endif
@section('content')


        <div class="column bg-light shadow col-11 mx-auto mt-5 rounded">
                    
            <div class="d-flex justify-content-between p-3">
                <h4>Cidades cadastradas / cadastro</h4>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary mx-3" href="/postos">Postos</a>
                    <a class="btn btn-success mx-3" href="/cidades">Cidades</a>
                    <a class="btn btn-danger mx-3" href="/combustiveis">Combustíves</a>
                </div>
            </div>
            
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Atenção!</strong> Combustível não cadastrado devido aos seguintes problemas:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table table-hover">
                
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Data de Coleta do Preço</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">ID Posto</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
                    
                    <form action="{{route('combustiveis.store')}}" method="POST">
                    @csrf
                    <tr>
                        <td>Cadastrar</td>
                        <td scope="row"><input type="text" name="tipo" placeholder="Tipo" class="form-control"></td>
                        <td scope="row"><input type="date" name="data_coleta" placeholder="Data da coleta" class="form-control"></td>
                        <td scope="row"><input type="number" step="0.001" name="preco_venda" placeholder="Preço de venda" class="form-control"></td>
                        <td scope="row">
                        <select scope="row" name="id_posto" class="form-control">
                            @foreach(($postos = postos::all()) as $posto)
                            <option value="{{$posto->id}}">{{$posto->razao_social}}</option>
                            @endforeach
                        </select>
                        </td>
                        <td scope="row">
                            <button type="submit" class="btn" style="background: #00A611;
                            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.10); border:0px; color:white; width: 100px;">Inserir</button>
                        </td>
                        <td scope="row">
                            <p>#</p>
                        </td>
                    </tr>
                    </form>

                    @foreach ($combustiveis as $combustivel)
                    <tr>
                        @if(@$_GET['editar'] == $combustivel->id )
                        <form action="{{route('combustiveis.update',$combustivel->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                            <td scope="row">{{$combustivel->id}}</td>
                            <td scope="row"><input type="text" name="tipo" placeholder="Tipo" value="{{$combustivel->tipo}}" class="form-control"></td>
                            <td scope="row"><input type="date" name="data_coleta" placeholder="Data da coleta do preço" value="{{$combustivel->data_coleta}}" class="form-control"></td>
                            <td scope="row"><input type="number" step="0.001" name="preco_venda" placeholder="Preço de venda" value="{{$combustivel->preco_venda}}" class="form-control"></td>
                            <td scope="row">
                            <select scope="row" name="id_posto" class="form-control">
                                @foreach(($postos = postos::all()) as $posto)
                                <option value="{{$posto->id}}" @if($posto->id == $combustivel->id_posto) selected>{{$posto->razao_social}}@endif</option>
                                @endforeach
                            </select>
                            </td>
                            <td scope="row">
                                <button type="submit" class="btn" style="background: blue;
                                box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.10); border:0px; color:white; width: 100px;">Aplicar</button>
                            </td>
                            <td scope="row">
                                <p>#</p>
                            </td>
                        </form>
                        @else
                        <td scope="row">{{$combustivel->id}}</td>
                        <td scope="row">{{$combustivel->tipo}}</td>
                        <td scope="row">{{date('d/m/Y', strtotime($combustivel->data_coleta))}}</td>
                        <td scope="row">R${{$combustivel->preco_venda}}</td>
                        <td scope="row">
                            @foreach(($postos = postos::all()) as $posto)
                                @if($posto->id == $combustivel->id_posto) {{$posto->razao_social}} @endif
                            @endforeach
                        </td>
                        <td scope="row">
                            <form method="GET">
                                <button class="btn btn-primary btn-xs" name="editar" value="{{$combustivel->id}}">Editar</button>  
                            </form>
                        </td>
                        <td scope="row">
                            <form action="{{route('combustiveis.destroy', $combustivel->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background: #E3000E;
                                box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.10); border:0px; color:white;">Excluir</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
@endsection