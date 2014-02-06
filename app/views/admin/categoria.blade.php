@extends('layouts.admin')
@section('content')
<div class="page-title">	
	<h3 class="semi-bold">{{ $categoria['nombre'] }}</h3>		
</div>
	<a href="/panel/categoria/{{ $categoria['id'] }}/nuevo" class="btn btn-success">Agregar producto</a>
<div class="pull-right">
	<div data-toggle="buttons-radio" class="btn-group">
		<button class="btn btn-primary active" type="button" id="ToList"><i class="icon-th-list"></i></button>
		<button class="btn btn-primary" type="button" id="ToGrid"><i class="icon-th-large"></i></button>
	</div>
</div>
<div class="clearfix"></div>
<br>
<ul id="Parks" class="just">
	<!-- "TABLE" HEADER CONTAINING SORT BUTTONS (HIDDEN IN GRID MODE)-->
	<div class="list_header">
		<div class="meta name active desc" id="SortByName"> Producto &nbsp; <span class="sort anim150 asc active" data-sort="data-name" data-order="desc"></span> <span class="sort anim150 desc" data-sort="data-name" data-order="asc"></span> </div>
		<div class="meta actions">Acciones</div>
	</div>
	<!-- FAIL ELEMENT -->
	<!-- BEGIN LIST OF PARKS (MANY OF THESE ELEMENTS ARE VISIBLE ONLY IN LIST MODE)-->
	
	@foreach($categoria->productos as $producto) 
	<li class="mix" data-id="{{ $producto->id }}">
		<div class="meta name">
			<div class="img_wrapper"> <img src="{{ $producto->imagen['imagen'] }}" /> </div>
			<div class="titles">
				<h2>{{ $producto->nombre }}</h2>
				<p><em>Bs. {{ $producto->precio }}</em></p>
			</div>
		</div>
		<div class="meta actions">
			<a href="/panel/producto/editar/{{ $producto->id }}" class="btn btn-primary">Editar</a>
			<a href="#" class="btn btn-danger p-delete">Eliminar</a>
		</div>
		
	</li>
	@endforeach
	
	
	<!-- END LIST OF PARKS -->
</ul>
@stop
@section('javascript')
	<script>
		$(document).on('ready', function(){
			$(".p-delete").on("click", function(event){
				event.preventDefault();
				var id = $(this).closest('li').data('id');
				$.post('/panel/producto/borrar/' + id, function(data, textStatus, xhr) {});
				$(this).closest('li').slideUp('400', function(){
					$(this).closest('li').remove();
				});
			});
		});
	</script>
@stop