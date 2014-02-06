@extends('layouts.admin')
@section('content')
<div class="page-title">	
	<h3>Categorías </h3>		
</div>
<div id="container">
	{{ Form::open(array('url' => '/panel/categoria' , 'enctype' => 'multipart/form-data')) }}
	<div class="col-md-6">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Agregar <span class="semi-bold">Categoría</span></h4>
			</div>
			<div class="grid-body no-border">
				<div class="input-group">
					<span class="input-group-addon primary">				  
						<span class="arrow"></span>
						<i class="icon-align-justify"></i>
					</span>
					<input type="text" name="nombre" class="form-control" required="required" placeholder="Nombre de la Categoría">
				</div>
				<br/>
				<input name="portada" type="file" required="required" />
				<br/>
				<input type="color" name="color" required="required">
				
				<input type="submit" class="btn btn-primary pull-right" value="Guardar"/>  
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
	<div class="row spacing-bottom 2col">
		@foreach($categorias as $categoria)
		<div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">	
			<div class="tiles blue added-margin" style="background-color:{{ $categoria['color'] }}">
				<div class="tiles-body">	
					<div class="controller">								
						<a href="/panel/categoria/editar/{{ $categoria['id'] }}" class="reload"></a>
						<a href="javascript:;" class="remove" data-id="{{ $categoria['id'] }}"></a>		
					</div>	
					<div class="tiles-title">
						{{ $categoria['nombre'] }}
					</div>	
					<div class="heading">
						<span class="animate-number" data-animation-duration="1200">{{ count($categoria['productos']) }}</span>
					</div>
					<div class="description"><span class="text-white mini-description ">Artículos publicados</span></div>
					<a href="/panel/categoria/{{ $categoria['id'] }}">
						<img src="/{{ $categoria->portada }}" class="img-responsive portada-categoria" alt="{{ $categoria->nombre }}" />
					</a>
				</div>	
			</div>
		</div>
		
		@endforeach
		
	</div>
</div>
@stop
@section('javascript')
<script type="text/javascript">
$(document).on('ready', function(){
	$(".remove").on("click", function(){
		var id = $(this).data('id');
		$.post('/panel/categoria/borrar/' + id , function(data, textStatus, xhr) {
		});
	});
});
</script>	
@stop
