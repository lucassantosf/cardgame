@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Configurações do CardGame</div>
                <div class="card-body">
                    <div class="container text-center">
                        <form method="POST" @if(!empty($data)) action="{{route('configs.update')}}" @else action="{{route('configs.post')}}" @endif enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-left">
                                <label for="name">Nome do Jogo</label>
                                <input type="text" class="form-control" name="name" value="{{old('name',!empty($data) ? $data->name : '')}}">
                            </div>
                            <div class="form-group text-left">
                                <label for="description">Frase</label>
                                <input type="text" class="form-control" name="phrase" value="{{old('phrase',!empty($data) ? $data->phrase: '')}}">
                            </div>
                            <div class="form-group text-left">
                                <label for="description">Descrição para formulário</label>
                                <input type="text" class="form-control" name="description_form" value="{{old('description_form',!empty($data) ? $data->description_form: '')}}">
                            </div>
                            <div class="form-group custom-file">
                                <input type="file" class="custom-file-input" name="image_background_url">
                                <label class="custom-file-label" for="arquivo">Imagem background</label>
                            </div>
                            <div class="form-group custom-file">
                                <input type="file" class="custom-file-input" name="image_second_url">
                                <label class="custom-file-label" for="arquivo">Imagem tema</label>
                            </div>
                            <button type="submit" class="btn btn-primary my-2">Enviar</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
