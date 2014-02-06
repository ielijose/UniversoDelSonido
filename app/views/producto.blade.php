@extends('layouts.master')
@section('content')
<div class="max-width bg1">	
	<!-- Start row1 -->
	<div class="row">
		<div class="col-lg-6 wrapper-bg bg2">
			<div id="slider" class="flexslider">
				<ul class="slides">
					<!--Start main image row1 -->
					@if(count($producto->imagenes) > 0)
					@foreach($producto->imagenes as $imagen)
					<li>
						<a href="{{ $imagen['imagen'] }}" data-pretty="prettyPhoto">
							<img src="{{ $imagen['imagen'] }}" alt="" />
						</a>
					</li>
					@endforeach
					@endif
				</ul>
			</div>
			<div id="carousel" class="flexslider">
				<ul class="slides">
					<!--Start thumb image row1 -->
					@if(count($producto->imagenes) > 1)
					@foreach($producto->imagenes as $imagen)
					<li>
						<a href="#">
							<img src="{{ $imagen['imagen'] }}" alt="" />
						</a>
					</li>
					@endforeach
					@endif
					
					<!--End thumb image row2 -->
				</ul>
			</div>
		</div>
		<div class="col-lg-6 wrapper-bg bg1">
			<!-- Start heading -->
			<div class="row">
				<div class="col-lg-12 bg2 heading pull-left">
					<h4>{{ $producto->nombre }}</h4>
					<span class="price price-lg">Bs. {{ $producto->precio }}</span>							
				</div>		
			</div>			
			<!-- End heading -->				
			<ul id="myTab" class="nav nav-tabs">
				<?php $class = $class2 = 'active'; ?>
				@if(strlen($producto->descripcion) > 0)
					<li class="active"><a href="#description" data-toggle="tab">Descripción</a></li>
					<?php $class = ''; ?>
				@endif
				@if(count($producto->detalles) > 0)
					<li class="{{ $class }}"><a href="#details" data-toggle="tab">Detalles</a></li>
					<?php $class = ''; ?>
				@endif
				<li class="{{ $class }}" ><a href="#comments" data-toggle="tab">Comentarios</a></li>
				<li class="add-to-cart"><a href="#" data-id="{{ $producto->id }}">Añadir al carrito</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				@if(strlen($producto->descripcion) > 0)
				<div class="tab-pane fade in active" id="description">
					<h4 class="head">Descripción<span></span></h4>
					<p>{{ $producto->descripcion }}</p>
				</div>
				<?php $class2 = ''; ?>
				@endif
				@if(count($producto->detalles) > 0)
				<div class="tab-pane fade in {{ $class2 }}" id="details">
					<h4 class="head">Detalles<span></span></h4>
					<ul class="detail-list">
						@foreach($producto->detalles as $detalle)
							<li>{{ $detalle['detalle'] }} </li>
						@endforeach
					</ul>
				</div>	
				<?php $class2 = ''; ?>
				@endif
				<div class="tab-pane fade in {{ $class2 }}" id="comments">
					<h4 class="head">Comentarios<span></span></h4>
					@if(count($producto->comentarios) > 0)
						@foreach($producto->comentarios as $comentario)
							<div class="media">
								<div class="media-body">
									<h5 class="media-heading">
										<a href="#"> {{ $comentario['nombre'] }} </a>
									</h5>
									<p> {{ $comentario['comentario'] }} </p>
								</div>
							</div>
						@endforeach
					@else
						<h5>Aun no hay comentarios acerca de este artículo, se el primero en decir algo.</h5>
					@endif
					{{ Form::open(array('url' => '/comentar', 'method' => 'post', 'id' => 'comentar', 'class' => 'margintop20 validateform')) }}
						<ul class="listForm">
							<li>
								{{ Form::label('nombre', 'Nombre:') }}
								{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' =>'Campo Obligatorio', 'data-rule' => "required", 'data-msg' => "Campo obligatorio." )) }}
								<div class="validation"></div>
							</li>
							<li>
								{{ Form::label('email', 'Email::') }}
								{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' =>'nombre@correo.com', 'data-rule' => 'email', 'data-msg' => 'Ingrese un correo electronico.' )) }}
								<div class="validation"></div>
							</li>
							<li>
								{{ Form::label('telefono', 'Telefono:') }}
								{{ Form::text('telefono', null, array('class' => 'form-control', 'placeholder' =>'0424-1234567', 'data-rule' => "required", 'data-msg' => "Campo obligatorio." )) }}
								<div class="validation"></div>
							</li>
							<li>
								{{ Form::label('comentario', 'Comentario:') }}
								{{ Form::textarea('comentario', null, array('class' => 'form-control', 'placeholder' =>'Campo Obligatorio', 'data-rule' => "required", 'data-msg' => "Campo obligatorio." )) }}
								<div class="validation"></div>
							</li>
							<li>
								<button type="submit" class="btn btn-lg btn-primary">Enviar Comentario</button>
							</li>
						</ul>
						{{ Form::hidden('id', $producto->id)}}
					{{ Form::close() }}
				</div>	
			</div>
		</div>			
	</div>			
	<!-- End row1 -->
	<!-- Start heading -->
	<div class="row">
		<div class="col-lg-12 bg6 pull-left">
			<div class="heading">
				<h4>Productos Relacionados</h4>
			</div>									
		</div>		
	</div>			
	<!-- End heading -->
	@if(count($relacionados)>0)
	<!-- Start row2 -->
	<div class="row">
		@foreach($relacionados as $relacionado)
		<div class="col-lg-3 wrapper-bg bg1 aligncenter" style="border:solid 3px #FFFFFF;">
			<a href="/producto/{{ $relacionado->id }}" class="buy"><span>Ver</span></a>
			<span class="caption-bg"></span>
			<span class="frame-hover"></span>
			<img src="{{ $relacionado->imagen['imagen'] }}" class="img-responsive" alt="">
			<div class="product-title">
				<h5><a href="/producto">{{ $relacionado->nombre }}</a></h5>
				<span class="price">Bs. {{ $relacionado->precio }}</span>
			</div>
		</div>
		@endforeach			
			
	</div>			
	<!-- End row2 -->	
	@endif
</div>
@stop
@section('javascript')
	<script>
		$(document).on('ready', function(){
			$(".add-to-cart a").on("click", function(event){
				event.preventDefault();
				var id = $(this).data('id');
				$.post('/cart/' + id + '/add', function(data, textStatus, xhr) {
					$.post('/total', function(data, textStatus, xhr) {
						$(".cart").html("Tu compra es de: <span> " + data + " Bs.</span>");
						$(".hide").removeClass('hide');
					});
				});
			})
		});
	</script>
@stop