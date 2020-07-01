@extends('layouts.app')
@section('content')
<style type="text/css">
    img{
        border-radius: 50px;
    }
    body{
        text-align: left;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">CardGame DashBoard</div>
                <div class="card-body">
                    @if(empty($data))
                        Nenhuma configuração para o CardGame<br>
                        <a href="{{route('configs')}}">Defina</a>
                    @else
                        <table class="table table-striped table-borderless table-responsive-sm">
                            <tbody>
                                <tr>
                                  <th>Nome do jogo</th>
                                  <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                  <th>Frase jogo</th>
                                  <td>{{$data->phrase}}</td>
                                </tr>
                                <tr>
                                  <th>Descrição para o formulário</th>
                                  <td>{{$data->description_form}}</td>
                                </tr>
                                <tr>
                                  <th>Pre-visualização da imagem Background</th>
                                  <td><img src="{{url('/uploads/'.$data->image_background_url)}}" width="80" height="80"></td>
                                </tr>
                                <tr>
                                  <th>Pre-visualização da imagem destaque</th>
                                  <td><img src="{{url('/uploads/'.$data->image_second_url)}}" width="80" height="80"></td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
