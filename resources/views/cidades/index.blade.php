@extends('layouts.layout')
@section('title')
Cidades
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
                <strong>Atenção!</strong> Cidade não cadastrado devido aos seguintes problemas:<br><br>
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
                    <th scope="col">Nome</th>
                    <th scope="col">UF</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
    
                <form action="{{route('cidades.store')}}" method="POST" class="form-horizontal container-fluid">
                    @csrf
                <tr>
                    <td>Cadastrar</td>
                    <td scope="row"><input type="text" name="nome" placeholder="Nome" class="form-control"></td>
                    <td scope="row"><input type="text" name="uf" placeholder="UF" class="form-control"></td>
                    <td scope="row"><input type="text" name="cep" placeholder="CEP" class="form-control"></td>
                    <td scope="row">
                        <button type="submit" class="btn" style="background: #00A611;
                        box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.10); border:0px; color:white; width: 100px;">Inserir
                        </button>
                    </td>
                    <td scope="row">
                        <p>#</p>
                    </td>
                </tr>
                </form>
                
                    @foreach ($cidades as $cidade)
                    <tr>
                        @if(@$_GET['editar'] == $cidade->id )
                        <form action="{{route('cidades.update',$cidade->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                            <td scope="row">{{$cidade->id}}</td>
                            <td scope="row"><input type="text" name="nome" placeholder="Nome" value="{{$cidade->nome}}" class="form-control"></td>
                            <td scope="row"><input type="text" name="uf" placeholder="UF" value="{{$cidade->uf}}" class="form-control"></td>
                            <td scope="row"><input type="text" name="cep" placeholder="CEP" value="{{$cidade->cep}}" class="form-control"></td>
                            <td scope="row">
                                <button type="submit" class="btn" style="background: blue;
                                box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.10); border:0px; color:white; width: 100px;">Aplicar</button>
                            </td>
                            <td scope="row">
                                <p>#</p>
                            </td>
                        </form>
                        @else
                        <td scope="row">{{$cidade->id}}</td>
                        <td scope="row">{{$cidade->nome}}</td>
                        <td scope="row">{{$cidade->uf}}</td>
                        <td scope="row">{{$cidade->cep}}</td>
                        <td scope="row">
                            <form method="GET">
                                <button class="btn btn-primary btn-xs" name="editar" value="{{$cidade->id}}">Editar</button>  
                            </form>
                        </td>
                        <td scope="row">
                            <form action="{{route('cidades.destroy', $cidade->id)}}" method="POST">
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