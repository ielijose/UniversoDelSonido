@extends('layouts.public')

@section('slider')
<section id="noslider" class="sixteen columns headerContent" data-layout="blur">

	<div id="blurMask">
		<canvas id="blurCanvas"></canvas>
	</div>

	<div class="headerContentContainer">
		<div class="pageTitle">Tu compra</div> 
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
		<ul class="features">
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
			<span class="sectionHeading">Datos de Facturación</span>
		</div>

	</div>


   <!-- Columns - One half
   ================================================== -->
   
   <section class="contactForm" style="background-color:#f8f8f8; padding:10px;">

   	<div id="" class="quote">

   		{{ Form::open(array('url' => '/pagar', 'method' => 'post', 'id' => 'pagar', 'enctype' => 'multipart/form-data')) }}
			<!-- Start billing address -->
			<div class="shipping-address bg5">
				<!-- Start heading -->
				<div class="row">
					<div class="col-lg-12 bg2 heading pull-left">
						<h4>Datos de facturación</h4>			
					</div>		
				</div>			
				<!-- End heading -->

				<div class="box">
					@if($factura->pago)						
						<ul class="listForm">
							<li>	
							{{ Form::label('recibo', 'Numero de recibo o transferencia: ') }}
								{{ $factura->pago->recibo }}
							</li>
							<li>
							{{ Form::label('monto', 'Monto: ')}}
								{{ $factura->pago->monto }}
								</li>
							<li>
							{{ Form::label('fecha', 'Fecha: ') }}
								{{ $factura->pago->fecha }}
							</li>
							<li>
							{{ Form::label('adjunto', 'Adjunto: ') }}
							<a href="/{{ $factura->pago->adjunto }}" target="_popup">ADJUNTO</a>	
							</li>							
						</ul>
					@else
						<div class="form-horizontal ">
							<ul class="listForm">
								{{ Form::label('recibo', 'Numero de recibo o transferencia: ', array('class' => 'col-lg-2 control-label')) }}
								<li class="col-lg-8">
									{{ Form::text('recibo', null, array('class' => 'form-block', 'placeholder' =>'Numero de recibo o transferencia', 'required' => "required")) }}
									<div class="validation"></div>
								</li>

								{{ Form::label('monto', 'Monto: ', array('class' => 'col-lg-2 control-label')) }}
								<li class="col-lg-8">
									{{ Form::text('monto', null, array('class' => 'form-block', 'placeholder' =>'Monto.', 'required' => "required" )) }}
									<div class="validation"></div>
								</li>

								{{ Form::label('fecha', 'Fecha: ', array('class' => 'col-lg-2 control-label')) }}
								<li class="col-lg-8">
									{{ Form::text('fecha', null, array('class' => 'form-block', 'placeholder' =>'dd/mm/aaaa', 'required' => "required" )) }}
									<div class="validation"></div>
								</li>


								{{ Form::label('adjunto', 'Adjunto: ', array('class' => 'col-lg-2 control-label')) }}
								<li class="col-lg-8">
									<input name="adjunto" type="file" required="required" />

									<div class="validation"></div>
								</li>
								
							</ul>																
						</div>	
					@endif	
				</div>
			</div>
			<!-- End billing address -->
			@if(!$factura->pago)
			<!-- Start cart action -->
			<div class="row">
				<div class="col-lg-12 bg2 cart-action">
					<input type="submit" class="submit button dark reverted" id="submit" value="Confirmar pago" style="background-color:#f60; margin-top:0px; margin-right:30px;">
				</div>		
			</div>
			@endif

			{{ Form::hidden('id', $factura->id )}}
		{{ Form::close() }}	



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
