@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @if($i==0) 
                <div class="card">
                    <div class="card-header">
                        Cards
                        <a href="/cards/form" class="btn btn-sm btn-info" style="float: right">Cadastrar</a>
                    </div> 
                    <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th colspan="2">Foto</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @if(isset($cards))
                                        @foreach($cards as $c)
                                            <tr>
                                                <th>{{$c->id}}</th>
                                                <td>{{$c->name}}</td>
                                                <td>{{$c->description}}</td> 
                                                <td><img src="/storage/{{$c->file_url}}" width="50" height="50"></td> 
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="/cards/form/{{$c->id}}/edit">Editar</a>
                                                    <form method="POST" action="/cards/{{$c->id}}/destroy">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">Sem Cards cadastrados</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            @endif
            @if($i==1)
                <section class="jumbotron text-center"> 
                    <div class="container">
                        <h4 class="jumbotron-heading">Cadastrar Novo Card</h4>
                        <form method="POST" action="/cards/form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-left">
                                <label for="name">Nome do Card</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>
                            <div class="form-group text-left">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div> 
                            <div class="form-group custom-file">  
                                <input type="file" class="custom-file-input" id="file_url" name="file_url">
                                <label class="custom-file-label" for="file_url">Escolha imagem</label>
                            </div>
                            <p>
                                <button type="submit" class="btn btn-primary my-2">Enviar</button> 
                                <a href="/cards" class="btn btn-sm btn-secondary my-2" style="float: right">Cancelar</a> 
                            </p>
                        </form>
                    </div>
                    @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger"> 
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </section>
            @endif
            @if($i==2)
                <section class="jumbotron text-center"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="jumbotron-heading">Editar Card {{$card->id}}</h4>
                            </div>
                            <div class="col-md-3">
                                <img src="/storage/{{$card->file_url}}" width="50" height="50" style="float: right;"> 
                            </div>
                        </div>
                        <form method="POST" action="/cards/form/{{$card->id}}/update" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-left">
                                <label for="name">Nome do Card</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$card->name}}">
                                <input type="hidden" name="id" value="{{$card->id}}">
                            </div>
                            <div class="form-group text-left">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{$card->description}}</textarea>
                            </div> 
                            <div class="form-group custom-file">  
                                <input type="file" class="custom-file-input" id="file_url" name="file_url" value="">
                                <label class="custom-file-label" for="file_url">Escolha imagem</label>
                            </div>
                            <p>
                                <button type="submit" class="btn btn-sm btn-primary my-2">Enviar</button> 
                                <a href="/cards" class="btn btn-sm btn-secondary my-2" style="float: right">Cancelar</a> 
                            </p>
                        </form>
                    </div>
                    @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger"> 
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </section>
            @endif
        </div>
    </div>
</div>
@endsection