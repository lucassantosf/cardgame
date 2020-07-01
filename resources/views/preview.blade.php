@extends('layouts.app')
@section('content')
	<style type="text/css">
		#backPreview{
			width: 100%;
			height: 100%;
		}
		#section1{
            height: 500px;
            background-image: url("{{url('/uploads/'.$data->image_background_url)}}");
            background-position: center top;
            background-size: 100% auto;
		}
		#section2{
			background-color: #363636;
			padding-bottom: 100px;
			padding-top: 100px;
		}
		#section3{
			background-color: #7DEDE2;
			height: 400px;
		}
		#cardSection3{
			padding-top: 50px;
			height: 440px;
			margin-top: -20px;
		}
		#section4{
			background-color: #363636;
			height: 200px;
		}
		#sectionTop{
			height: 50px;
			background-color: #363636;
			color: white;
		}
		#imgSecond{
			width: 300px;
			height: 500px;
			margin-left: 37%;
		}
		.card{
			border-radius: 30px;
			height: 450px
		}
		.card img{
			margin-top: -25px;
			margin-left: 25%;
        	border-radius: 25px;
		}
	</style>
	<div class="container" id="backPreview">
		<section id="sectionTop" style="text-align: center;">
			<img src="{{url('svg/component1.png')}}" width="50" height="50">
			@if(!empty($data))
        		{{$data->name}}
    		@endif
		</section>
		<section id="section1">
			@if(!empty($data))
        		<img id="imgSecond" @if(!empty($data)) src="{{url('/uploads/'.$data->image_second_url)}}"> @endif
    		@endif
		</section>
		<section id="section2">
			<div class="container">
				<div class="row">
					@if(isset($cards))
						@foreach($cards as $c)
							<div class="col-sm-1"></div>
							<div class="col-sm-3">
								<div class="card">
									<div class="card-title">
										<img src="{{$c->file_url}}" width="120" height="200">
									</div>
									<div class="card-body">
										{{$c->description}}
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</section>
		<section id="section3">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card" id="cardSection3">
						<h4 class="card-title" style="color: #63C7A9;text-align: center">
							Formulário
						</h4>
						<div class="row">
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-sm-8">
									@if(!empty($data))
		                        		{{$data->description_form}}
		                    		@endif
								</div>
								<div class="col-sm-2"></div>
							</div>
							<br>
							<div class="row form-group">
								<div class="col-sm-3"></div>
								<div class="col-sm-7">
									<input class="from-control" type="text" name="nome" placeholder="Nome">
									<input class="from-control" type="text" name="email" placeholder="Email">
								</div>
								<div class="col-sm-2"></div>
							</div>
							<div class="row form-group">
								<div class="col-sm-3"></div>
								<div class="col-sm-6">
									<textarea class="from-control" rows="3" style="width: 100%"></textarea>
								</div>
								<div class="col-sm-3"></div>
							</div>
							<div class="row form-group">
								<div class="col-sm-3"></div>
								<div class="col-sm-6">
									<button class="btn btn-sm btn-info">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</section>
		<section id="section4"></section>
	</div>
@endsection
@section('javascript')
	<script type="text/javascript">
	$(document).ready(function () {

	});
	</script>
@endsection
