@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card"> 
                <div class="card-header">Configurações do CardGame</div> 
                <div class="card-body">
                    <div class="container text-center">  
                        <form method="POST" @if(count($data)>0) action="/configs/edit" @else action="/configs" @endif enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-left">
                                <label for="name">Nome do Jogo</label>
                                <input type="text" class="form-control" id="name" name="name" value="@if(count($data)>0) {{$data[0]->name}} @endif">
                            </div>
                            <div class="form-group text-left">
                                <label for="description">Frase</label>
                                <input type="text" class="form-control" id="phrase" name="phrase" value="@if(count($data)>0) {{$data[0]->name}} @endif">
                            </div> 
                            <div class="form-group text-left">
                                <label for="description">Descrição para formulário</label>
                                <input type="text" class="form-control" id="description_form" name="description_form" value="@if(count($data)>0) {{$data[0]->description_form}} @endif">
                            </div> 
                            <div class="form-group custom-file"> 
                                <input type="hidden" name="img_back" value="@if(count($data)>0){{$data[0]->image_background_url}}@endif"> 
                                <input type="file" class="custom-file-input" id="image_background_url" name="image_background_url">
                                <label class="custom-file-label" for="arquivo">Imagem background</label>
                            </div> 
                            <div class="form-group custom-file">  
                                <input type="hidden" name="img_sec" value="@if(count($data)>0){{$data[0]->image_second_url}}@endif"> 
                                <input type="file" class="custom-file-input" id="image_second_url" name="image_second_url">
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