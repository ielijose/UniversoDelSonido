@extends('layouts.admin')
@section('content')
<div class="page-title">	
	<h3>Nuevo Producto - Categoría [ <span class="semi-bold">{{ $categoria['nombre'] }}</span> ]</h3>		
</div>
<div class="row">
	{{ Form::open(array('url' => '/panel/categoria/nuevo', 'enctype' => 'multipart/form-data', 'class' => 'form-no-horizontal-spacing', 'id' => 'form-condensed')) }}
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-body no-border">
				<div class="row column-seperation">
					<div class="col-md-6">
						<h4>Información del producto</h4>            
						<div class="row form-row">
							<div class="col-md-6">
								<input name="nombre" type="text" required="required" class="form-control" placeholder="Nombre del producto">
							</div>
							<div class="col-md-6">
								<input name="precio" type="text" required="required" class="form-control" placeholder="Precio">
							</div>
						</div>
						<div class="row form-row">
							<div class="col-md-12">
								<textarea name="descripcion" class="form-control" rows="5" placeholder="Descripción ..."></textarea>
							</div>
						</div>							
					</div>
					<div class="col-md-6">
						<h4>Detalles</h4>
						<div class="row form-row">
							<div class="col-md-12">
								<input name="detalles" class="form-control span12 tagsinput" id="source-tags" type="text"  />
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
				<a href="/panel/categoria/{{ $categoria['id'] }}" class="btn btn-white btn-cons" type="button">Cancelar</a>
			</div>
		</div>
	</div>
	{{  Form::hidden('categoria_id', $categoria['id']); }}
	{{ Form::close() }}
</div>
@stop