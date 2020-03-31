@extends('plantilla')
@section('titulo')
: notas
@stop

@section('cuerpo')

<div class="row mt-2">
		<div class="col">
			<a href="{{ route('nota.aniadir', [ 'idt' => $_GET['id']]) }}"><i class="far fa-plus-square"></i> añadir nota</a>
		</div>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>texto</th>
				<th>fecha</th>
				<th>completado</th>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($notas as $item)
			<tr>
				<td>{{ $item->texto }}</td>
				<td>@df($item)</td>
				<!--<td>{{ $item->completado }}</td>-->
				<td>
					@if($item->completado)
						si 
					@else
						no
					@endif
				</td>
				<td><a href="{{ route('nota.editar', ['id' => $item->idNot]) }}"><i class="fas fa-edit"></i>editar</a></td>
				<td></td>
			</tr>
			@endforeach
		</tbody>


@stop

	