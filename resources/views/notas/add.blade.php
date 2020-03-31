@extends('plantilla')
@section('titulo')
: @lang('messages.lbaniadir')
@stop

@section('cuerpo')

	
	<div class="row">
		<div class="col">


			<!-- CRSF (Cross-site Request Fogery) -->
			<form action="{{ route('nota.aniadir') }}" method="post">
				<input type="hidden" name="idt" value="{{$_GET['idt']}}">
				@csrf

				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" type="text" name="txt"
							   autocomplete="off" 
							   value=""
							   required autofocus />
					</div>

					<div class="col-sm-1">
						<button class="btn btn-primary" type="submit">@lang('messages.btguardar')</button>

					</div>

					<div class="col-sm-1">
						<a class="btn btn-danger text-white"
						   href="{{ route('nota.ver') }}">@lang('messages.btcancelar')</a>
					</div>
				</div>
			</form>
		</div>
	</div>


	@if (!$errors->isEmpty())
	<div class="row mt-2">
		<div class="col-sm-4">
			<div class="alert alert-danger" role="alert">
		  		{{ $errors->first('nom') }}
			</div>
		</div>
	</div>
	@endif

@stop

