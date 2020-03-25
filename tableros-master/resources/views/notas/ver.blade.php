@extends('plantilla')
@section('titulo')
: notas
@stop

@section('cuerpo')

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
				
			</tr>
			@endforeach
		</tbody>


@stop

	