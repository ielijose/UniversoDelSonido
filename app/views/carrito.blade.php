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
@if(count($cart) > 0)
<section class="sixteen columns row-fourty left-twenty comparison">
	<article class="oneseventh">
    <header><h4>PRODUCTO</h4></header>
		<ul class="features" style="margin-top:0px;">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++; $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">  {{ $item->name }}  </li>
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
				<a href="/cart/minus/{{ $item->rowid }}" class="cart-change minus">- </a> 
				<span class="cart-qty">{{ $item->qty }}</span>
				<a href="/cart/plus/{{ $item->rowid }}" class="cart-change plus"> +</a> 
			</li>
			@endforeach
		</ul>
	</article>

	<article class="onesixth">
		<header><h4>PRECIO</h4></header>
		<ul class="features" style="font-weight:bold; color:#F30; font-size:16px;">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++;  $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">Bs.  {{ $item->price }}  </li>
			@endforeach
		</ul>
	</article>

	<article class="onesixth">
		<header class=""><h4>SUBTOTAL</h4></header>
		<ul class="features" style="font-weight:bold; color:#C00; font-size:16px;">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++; $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">Bs.   {{ $item->price*$item->qty }}  </li>
			@endforeach
		</ul>
	</article>

	<article class="onesixth">
		<header class="highlighted"><h4>ELIMINAR</h4></header>
		<ul class="features">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++; $class= (($i%2)==0) ? "odd": "" ; ?>
			<a href="/cart/remove/{{ $item->rowid }}">
				<li class="{{ $class }} no"></li>
			</a>
			@endforeach
		</ul>

		<header class="highlighted"><h4>TOTAL</h4></header>
		<ul class="features" style="font-weight:bold; color:#F00; font-size:18px;">
			<li>Bs.  {{ Cart::total() }} </li>
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

   	<div id="contact" class="quote">


	{{ Form::open(array('url' => '/procesar', 'method' => 'post', 'id' => 'procesar', 'class' => 'validateform')) }}

   			<fieldset>
   				{{ Form::label('nombre', 'Nombre: ', array('class' => 'col-lg-2 control-label')) }}
   				{{ Form::text('nombre', null, array('placeholder' =>'Ingresa tu nombre.', 'required'=> 'required')) }}


   				{{ Form::label('telefono', 'Teléfono: ', array('class' => 'col-lg-2 control-label')) }}
				{{ Form::text('telefono', null, array('placeholder' =>'Ingresa tu número teléfonico.', 'required'=> 'required')) }}


				{{ Form::label('correo', 'Correo: ', array('class' => 'col-lg-2 control-label')) }}
				{{ Form::text('correo', null, array('placeholder' =>'Ingresa tu correo electronico.', 'required'=> 'required')) }}
							
				{{ Form::label('direccion', 'Dirección de envio: ', array('class' => 'col-lg-2 control-label')) }}
						
				{{ Form::text('direccion', null, array('placeholder' =>'Ingresa tu dirección de envio.', 'required'=> 'required')) }}
				<p style="margin-top:-160px; margin-left:400px;">Ingresa tus datos para reportar la compra y recibir por correo los datos de </p>
   				<input type="submit" class="submit button dark reverted" id="submit" value="Procesar compra" style="background-color:#f60; margin-top:0px; margin-right:30px;">

   			</fieldset>

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