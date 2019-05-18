@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">CardGame DashBoard</div> 
                <div class="card-body"> 
                    @if(count($data) == 0)
                        Não foi definido nenhuma configuração para o CardGame
                    @else
                        Nome do jogo : {{$data[0]->name}} <br>
                        Frase jogo : {{$data[0]->phrase}} <br>
                        Descrição para o formulário : {{$data[0]->description_form}} <br>
                        Pre-visualização da imagem Background<br>
                        <img src="/storage/{{$data[0]->image_background_url}}" width="100" height="100"><br>
                        Pre-visualização da imagem destaque<br>
                        <img src="/storage/{{$data[0]->image_second_url}}" width="100" height="100">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
