@extends('layouts.admin')
@section('content')
<div class="page-title">
	<h3>Editar Producto</h3>
</div>
<div class="row">
	{{ Form::open(array('url' => '/panel/producto/editar', 'enctype' => 'multipart/form-data', 'class' => 'form-no-horizontal-spacing', 'id' => 'form-condensed')) }}
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-body no-border">
				<div class="row column-seperation">
					<div class="col-md-6">
						<h4>Información del producto</h4>
						<div class="row form-row">
							<div class="col-md-6">
								<input name="nombre" value="{{ $producto->nombre }}" type="text" required="required" class="form-control" placeholder="Nombre del producto">
							</div>
							<div class="col-md-6">
								<input name="precio" value="{{ $producto->precio }}" type="text" required="required" class="form-control" placeholder="Precio">
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-12">
								<textarea name="descripcion" class="form-control" rows="5" placeholder="Descripción ...">{{ $producto->descripcion }}</textarea>
							</div>
						</div>	
					</div>
					<div class="col-md-6">
						<h4>Detalles</h4>
						<div class="row form-row">
							<div class="col-md-12">
								<input name="detalles" class="form-control span12 tagsinput" id="source-tags" type="text" value="{{ $producto->stringdetalles }}" />
								<div class="row small-text">
									<p class="col-md-12">
										Ingresa los detalles del producto, separa con la tecla [ENTER]
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Cargar <span class="semi-bold">Imagenes</span></h4>
			</div>
			
		<div class="grid-body">
			<div class="row">
              
            
			@foreach($producto->imagenes as $imagen)
			<div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">	
				<div class="tiles blue added-margin" style="background-color:#FFF">
					<div class="tiles-body">	
						<div class="controller">								
							<a href="javascript:;" class="remove img-delete" data-id="{{ $imagen->id }}"></a>		
						</div>	
					
							<img src="{{ $imagen->imagen }}" class="img-responsive portada-categoria max-200" alt="Accesorios">
					</div>	
				</div>
			</div>
			
			@endforeach
			</div>
		</div>
			<div class="grid-body no-border">
				<div class="row-fluid">
					<div id="dz" class="dropzone no-margin">
						<div class="fallback">
							<input name="file" required="required" type="file" multiple />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<div class="pull-right">
				<button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Guardar</button>
				<a href="/panel/categoria/{{ $producto['id'] }}" class="btn btn-white btn-cons" type="button">Cancelar</a>
			</div>
		</div>
	</div>
	{{  Form::hidden('id', $producto['id']); }}
	{{ Form::close() }}
</div>
@stop
@section('javascript')
	<script>
		$(document).on('ready', function(){
			$(".img-delete").on("click", function(event){
				event.preventDefault();
				var id = $(this).data('id');
				$.post('/panel/imagen/borrar/' + id, function(data, textStatus, xhr) {});
				$(this).closest('li').slideUp('400', function(){
					$(this).closest('li').remove();
				});
			});
		});
	</script>
@stop