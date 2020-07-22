<?php use App\cidades; ?>
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


        <div class="column bg-light shadow col-11 mx-auto mt-5 rounded">
                    
            <div class="d-flex justify-content-between p-3">
                <h4>Cidades cadastradas / cadastro</h4>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary mx-3" href="/postos">Postos</a>
                    <a class="btn btn-success mx-3" href="/cidades">Cidades</a>
                    <a class="btn btn-danger mx-3" href="/combustiveis">Combustíves</a>
                    <a href="/logout">Logout</a>
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Atenção!</strong> Posto não cadastrado devido aos seguintes problemas:<br><br>
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
                        <th scope="col">CNPJ</th>
                        <th scope="col">Razão Social</th>
                        <th scope="col">Nome Fantasia</th>
                        <th scope="col">Bandeira</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Id Cidade</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                    
                    <form action="{{route('postos.store')}}" method="POST">
                    @csrf
                    <tr>
                        <td>Cadastrar</td>
                        <td scope="row"><input type="text" name="cnpj" placeholder="CNPJ" class="form-control"></td>
                        <td scope="row"><input type="text" name="razao_social" placeholder="Razão Social" class="form-control"></td>
                        <td scope="row"><input type="text" name="nome_fantasia" placeholder="Nome Fantasia" class="form-control"></td>
                        <td scope="row"><input type="text" name="bandeira" placeholder="Bandeira" class="form-control"></td>
                        <td scope="row"><input type="text" name="endereco" placeholder="Endereço" class="form-control"></td>
                        <td scope="row"><input type="text" name="bairro" placeholder="Bairro" class="form-control"></td>
                        <td scope="row">
                        <select scope="row" name="id_cidade" class="form-control">
                            @foreach(($cidades = cidades::all()) as $cidade)
                            <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
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

                    @foreach ($postos as $posto)
                    <tr>
                        @if(@$_GET['editar'] == $posto->id )
                        <form action="{{route('postos.update',$posto->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                            <td scope="row">{{$posto->id}}</td>
                            <td scope="row"><input type="text" name="cnpj" placeholder="CNPJ" value="{{$posto->cnpj}}" class="form-control"></td>
                            <td scope="row"><input type="text" name="razao_social" placeholder="Razão Social" value="{{$posto->razao_social}}" class="form-control"></td>
                            <td scope="row"><input type="text" name="nome_fantasia" placeholder="Nome Fantasia" value="{{$posto->nome_fantasia}}" class="form-control"></td>
                            <td scope="row"><input type="text" name="bandeira" placeholder="Bandeira" value="{{$posto->bandeira}}" class="form-control"></td>
                            <td scope="row"><input type="text" name="endereco" placeholder="Endereço" value="{{$posto->endereco}}" class="form-control"></td>
                            <td scope="row"><input type="text" name="bairro" placeholder="Bairro" value="{{$posto->bairro}}" class="form-control"></td>
                            <td scope="row">
                            <select scope="row" name="id_cidade" class="form-control" value="{{$posto->id_cidade}}">
                                @foreach(($cidades = cidades::all()) as $cidade)
                                <option value="{{$cidade->id}}" @if($posto->id_cidade == $cidade->id) selected @endif >{{$cidade->nome}}</option>
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
                        <td scope="row">{{$posto->id}}</td>
                        <td scope="row">{{$posto->cnpj}}</td>
                        <td scope="row">{{$posto->razao_social}}</td>
                        <td scope="row">{{$posto->nome_fantasia}}</td>
                        <td scope="row">{{$posto->bandeira}}</td>
                        <td scope="row">{{$posto->endereco}}</td>
                        <td scope="row">{{$posto->bairro}}</td>
                        <td scope="row">
                            <?php $cidades = cidades::where('id', $posto->id_cidade)->first(); ?>
                            {{$cidades->nome}}
                        </td>
                        <td scope="row">
                            <form method="GET">
                                <button class="btn btn-primary btn-xs" name="editar" value="{{$posto->id}}">Editar</button>  
                            </form>
                        </td>
                        <td scope="row">
                            <form action="{{route('postos.destroy', $posto->id)}}" method="POST">
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