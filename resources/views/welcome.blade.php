@extends('adminlte::page')

@section('title', 'Prueba Morse')

@section('content')
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Formulario</h3>
		</div>
		<form class="form-horizontal">
		{{-- <form role="form" class="form-horizontal" id="form" method="POST" action="{{action('App\Http\Controllers\WokenController@index')}}"> --}}
			{{-- {{ csrf_field() }} --}}
			<div class="card-body">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<label for="morse">Ingresar Codigo Morse: </label>
						<input class="form-control" id="morse" name="morse" maxlength="100000" onkeypress="return ((event.charCode == 46) || (event.charCode == 45))" value="{{isset($request->morse) ? $request->morse : ''}}" {{isset($request->morse) ? 'readonly' : ''}} required>
						</div>
						<div class="col-sm-4">
							<label for="num_palabra">Ingrese Numero de palabras: </label>
							<input type="number" min="1" max="100000" class="form-control" id="num_palabra" name="num_palabra" value="{{isset($request->num_palabra) ? $request->num_palabra : ''}}" {{isset($request->num_palabra) ? 'readonly' : ''}} required>
						</div>
					</div>
				</div>
			</div>
			@if (isset($request->num_palabra))
				<div class="card-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label for="palabras">Ingresar Palabras: </label>
							</div>
						</div>
						@for ($i = 0; $i < $request->num_palabra; $i++)
							<div class="row">
								<div class="col-sm-4">
									<input class="form-control" id="palabras" name="palabras[]" maxlength="20" onkeypress="return ((event.charCode <= 122 && event.charCode >= 97))" value="{{isset($request->palabras[$i]) ? $request->palabras[$i] : ''}}" {{isset($request->palabras[$i]) ? 'readonly' : ''}} required><br>
								</div>
								@if (isset($palabras_morse))
									<div class="col-sm-4">
										<label>{{$palabras_morse[$i]}} </label>
									</div>
									<div class="col-sm-4">
										<label>{{is_numeric($posicion_morse[$i]) ? 'Encontrada' : 'No encontrada'}} </label>
									</div>
								@endif
							</div>
						@endfor
					</div>
				</div>
			@endif
			@if (isset($contador))
				<div class="card-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-8">
							<h1>Mensajes Encontrados: {{$contador}}</h1>
							</div>
						</div>
					</div>
				</div>
			@endif
		  	<div class="card-footer text-right">
				<input type="button" class="btn btn-warning" onclick="history.back()" name="Volver" value="Volver">
				@if (!isset($contador))
					<button type="submit" class="btn btn-success">Siguiente</button>
				@endif
		  	</div>
		</form>
	  </div>
@stop