@extends('plantilla')
@section('titulo')
: @lang('messages.lbeditar')
@stop

@section('cuerpo')

	
	<div class="row">
		<div class="col">

			@if($nota)
			<!--{{$nota}}--> 
			<!-- CRSF (Cross-site Request Fogery) -->
			<form action="{{ route('nota.editar') }}" method="post">

				<input type="hidden" name="id" value="{{ $nota->idNot }}" />
				@csrf

				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" type="text" name="nom" 
							   value="{{ $nota->texto }}"
							   required />
					</div>
					<div class="col-sm-4">
						@if($nota->completado)
						<select name="com">
							<option value="0" >
								no
							</option>
							<option value="1" selected>
								si
							</option>
						</select>
						@else
						<select name="com">
							<option value="0" selected>
								no
							</option>
							<option value="1">
								si
							</option>
						</select>
						@endif
					</div>
					<div class="col-sm-2">
						<button class="btn btn-primary" type="submit">@lang('messages.btguardar')</button>
					</div>
				</div>
			</form>
			@else
			
			@endif
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

