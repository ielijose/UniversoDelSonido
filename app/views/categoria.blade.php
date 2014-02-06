@extends('layouts.master')
@section('content')
	<div class="max-width">
		<!-- Start pagination -->
		<div class="row">
			<div class="col-lg-12 bg6 pull-right pagination-wrapp">
					
				<?php echo $productos->links(); ?>
				<div class="heading head-categoria pull-right">
					<h4> {{ $categoria->nombre }} </h4>
				</div>	
			</div>
		</div>
		<!-- End pagination -->
	
	@if(count($productos) > 0)
		<!-- Start row1 -->
		<div class="row">
			@foreach($productos as $producto)
			<div class="col-lg-3 wrapper-bg bg1 aligncenter" style="border:solid 3px #FFFFFF;">
				<a href="/producto/{{ $producto->id }}" class="buy"><span>Ver</span></a>
				<span class="caption-bg"></span>
				<span class="frame-hover"></span>
				<img src="{{ $producto->imagen['imagen'] }}" class="img-responsive full-width" alt="">
				<div class="product-title">
					<h5><a href="/producto">{{ $producto->nombre }}</a></h5>
					<span class="price">Bs. {{ $producto->precio }}</span>
				</div>
			</div>
			@endforeach				
						
		</div>			
		<!-- End row1 -->	
	@else
		<h3 align="center" class="margintop20">No hay productos en esta categoria.</h3>
	@endif
		<!-- Start pagination -->
		<div class="row">
			<div class="col-lg-12 bg6 pull-left pagination-wrapp">
				<?php echo $productos->links(); ?>			
			</div>
		</div>
		<!-- End pagination -->
		
		<!-- Start social network -->
					
		<!-- End social network -->				
	</div>
@stop