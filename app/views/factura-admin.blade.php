@extends('layouts.public')

@section('slider')
<section id="noslider" class="sixteen columns headerContent" data-layout="blur">

	<div id="blurMask">
		<canvas id="blurCanvas"></canvas>
	</div>

	<div class="headerContentContainer">
		<div class="pageTitle">Datos de la compra</div> 
	</div>           
</section>
@stop

@section('content')



<div class="contentBgFull"></div>

<!-- Tag Line ================================================== -->

<div id="tagLineShadow" class="sixteen columns"></div>

<!-- Portfolio items ================================================== -->
<?php $cart = $factura->items; $total = 0; ?>
@if(count($cart) > 0)

<section class="sixteen columns row-fourty left-twenty comparison">
	<article class="onefourth">
    <header><h4>PRODUCTO</h4></header>
		<ul class="features" style="margin-top:0PX;">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++; $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">  {{ $item->producto->nombre }}  </li>
			@endforeach
		</ul>
	</article>

	<article class="onefourth">
		<header><h4>CANTIDAD</h4></header>
		<ul class="features">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++;  $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">
				<span class="cart-qty">{{ $item->cantidad }}</span>
			</li>
			@endforeach
		</ul>
	</article>

	<article class="onefourth">
		<header><h4>PRECIO</h4></header>
		<ul class="features" style="font-weight:bold; color:#F30; font-size:16px;">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++;  $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">Bs.  {{ $item->precio }}  </li>
			@endforeach
		</ul>
	</article>

	<article class="onefourth last">
		<header class=""><h4>SUBTOTAL</h4></header>
		<ul class="features" style="font-weight:bold; color:#C00; font-size:16px;">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++; $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">Bs.   {{ $item->precio*$item->cantidad }}  </li>
			<?php $total += $item->precio*$item->cantidad; ?>
			@endforeach
		</ul>
	</article>

	<article class="onefourth" style="float:right">		
		<header class="highlighted"><h4>TOTAL</h4></header>
		<ul class="features" style="font-weight:bold; color:#F00; font-size:18px;">
			<li>Bs.  {{ $total }} </li>
		</ul>
	</article>

	
</section>

<section class="sixteen columns offset-by-one">

	<div class="sectionHeader row">

		<div class="sectionHeadingWrap">
			<span class="sectionHeading">Datos del Cliente</span>
		</div>

	</div>


   <!-- Columns - One half
   ================================================== -->
   
   <section class="contactForm" style="background-color:#f8f8f8; padding:10px;">

   	<div id="" class="quote">
			<!-- Start billing address -->
			<div class="shipping-address bg5">
				<!-- Start heading -->
				<div class="row">
					<div class="col-lg-12 bg2 heading pull-left">
						<h4>Datos del Cliente</h4>			
					</div>		
				</div>			
				<!-- End heading -->
				<div class="box">
						<ul class="listForm">
							<li>	
							{{ Form::label('recibo', 'Nombre: ') }}
								{{ $factura->nombre }}
							</li>
							<li>
							{{ Form::label('monto', 'Teléfono: ')}}
								{{ $factura->telefono }}
								</li>
							<li>
							{{ Form::label('fecha', 'Correo: ') }}
								{{ $factura->correo }}
							</li>
							<li>
							{{ Form::label('adjunto', 'Dirección: ') }}
								{{ $factura->direccion }}
							</li>							
						</ul>	
				</div>

				@if(!$factura->pago)
				<!-- Start cart action -->
				<div class="row">
					<div class="col-lg-12 bg2 cart-action">
						<h2 class="button dark reverted" style="background-color:#f60; margin-top:0px; margin-right:30px; padding:8px;"> Aun no pagada. </h2>
					</div>		
				</div>
			@endif
			</div>
			<!-- End billing address -->
   	</div>

   </section>


</section>


@else
	<section class="sixteen columns row-fourty left-twenty comparison">
		<h2 align="center">No hay productos en tu carrito de compras :(</h2>
	</section>
@endif

<div class="clearfix"></div>
@stop
