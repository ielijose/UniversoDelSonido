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
		<ul class="features">
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
		<ul class="features">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++;  $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">  {{ $item->price }}  </li>
			@endforeach
		</ul>
	</article>

	<article class="onesixth">
		<header class=""><h4>SUBTOTAL</h4></header>
		<ul class="features">
			<?php $i = -1; ?>
			@foreach($cart as $item)
			<?php $i++; $class= (($i%2)==0) ? "odd": "" ; ?>
			<li class="{{ $class }}">  {{ $item->price*$item->qty }}  </li>
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
		<ul class="features">
			<li> {{ Cart::total() }} </li>
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
   
   <section class=" contactForm">

   	<div id="contact" class="quote">


	{{ Form::open(array('url' => '/procesar', 'method' => 'post', 'id' => 'procesar', 'class' => 'validateform')) }}

   			<fieldset>
   				{{ Form::label('nombre', 'Nombre: ', array('class' => 'col-lg-2 control-label')) }}
   				{{ Form::text('nombre', null, array('placeholder' =>'Ingresa tu nombre.', 'required'=> 'required')) }}


   				{{ Form::label('telefono', 'Teléfono: ', array('class' => 'col-lg-2 control-label')) }}
				{{ Form::text('telefono', null, array('placeholder' =>'Ingresa tu número teléfonico.', 'required'=> 'required')) }}


				{{ Form::label('correo', 'Correo: ', array('class' => 'col-lg-2 control-label')) }}
				{{ Form::text('correo', null, array('placeholder' =>'Ingresa tu correo electronico.', 'required'=> 'required')) }}
							
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
           
           <article class="oneseventh first">
          <header class="highlighted"><h4>PRODUCTO</h4></header>
              
              <ul class="features" style="margin-top:0;">
              	<?php $i = -1; ?>
              	@foreach($cart as $item)
              	<?php $i++; ?>
              	<?php  $class= (($i%2)==0) ? "odd": "" ; ?>
                <li class="{{ $class }}">
                	{{ $item->name }}
                </li>
                @endforeach
             </ul>
             
           </article>

                      
           <article class="onefourth">
           
            <header><h4>CANTIDAD</h4></header>
              
               <ul class="features" style="margin:-4px 0 -3px 0;" >
               	<?php $i = -1; ?>
              	@foreach($cart as $item)
              	<?php $i++; ?>
              	<?php  $class= (($i%2)==0) ? "odd": "" ; ?>
                <li class="{{ $class }}">
                	<a href="/cart/minus/{{ $item->rowid }}" class="cart-change minus">- </a> 
						<span class="cart-qty">{{ $item->qty }}</span>
					<a href="/cart/plus/{{ $item->rowid }}" class="cart-change plus"> +</a> 
                </li>
                @endforeach
             </ul>
             
           </article>
           
        
           
           
           <article class="oneseventh">
           
            <header><h4>PRECIO</h4></header>
              
               <ul class="features">
              	<?php $i = -1; ?>
              	@foreach($cart as $item)
              	<?php $i++; ?>
              	<?php  $class= (($i%2)==0) ? "odd": "" ; ?>
                <li class="{{ $class }}">
                	{{ $item->price }}
                </li>
                @endforeach
             </ul>
             
           </article>

           <article class="oneseventh">
           
            <header class=""><h4>SUBTOTAL</h4></header>
              
               <ul class="features">
              	<?php $i = -1; ?>
              	@foreach($cart as $item)
              	<?php $i++; ?>
              	<?php  $class= (($i%2)==0) ? "odd": "" ; ?>
                <li class="{{ $class }}">
                	{{ $item->price*$item->qty }}
                </li>
                @endforeach
             </ul>
             
           </article>

           <article class="oneseventh last">
           
            <header class="highlighted"><h4>ELIMINAR</h4></header>
              
               <ul class="features">
              	<?php $i = -1; ?>
              	@foreach($cart as $item)
              	<?php $i++; ?>
              	<?php  $class= (($i%2)==0) ? "odd": "" ; ?>
              	<a href="/cart/remove/{{ $item->rowid }}">
                <li class="{{ $class }} no">
                	
                </li></a>
                @endforeach
             </ul>
             
           </article>

           <article class="onethird" style="float:right; margin-right:10px;">
           
            <header class="highlighted"><h4>TOTAL</h4></header>
              
               <ul class="features">
                <li> {{ Cart::total() }} </li>
             </ul>
             
           </article>
           
        </section>
        @else
        	<section class="sixteen columns row-fourty left-twenty comparison">
					<h2 align="center">No hay productos en tu carrito de compras :(</h2>
        	</section>
        @endif
=======
				{{ Form::label('direccion', 'Dirección de envio: ', array('class' => 'col-lg-2 control-label')) }}
						
				{{ Form::text('direccion', null, array('placeholder' =>'Ingresa tu dirección de envio.', 'required'=> 'required')) }}
>>>>>>> 1bd72f4eca0d3ca7198ad84117ecd1a4c4772ad8
=======
				{{ Form::label('direccion', 'Dirección de envio: ', array('class' => 'col-lg-2 control-label')) }}
						
				{{ Form::text('direccion', null, array('placeholder' =>'Ingresa tu dirección de envio.', 'required'=> 'required')) }}
>>>>>>> 1bd72f4eca0d3ca7198ad84117ecd1a4c4772ad8
=======
				{{ Form::label('direccion', 'Dirección de envio: ', array('class' => 'col-lg-2 control-label')) }}
						
				{{ Form::text('direccion', null, array('placeholder' =>'Ingresa tu dirección de envio.', 'required'=> 'required')) }}
>>>>>>> 1bd72f4eca0d3ca7198ad84117ecd1a4c4772ad8

   				<input type="submit" class="submit button normal dark" id="submit" value="Procesar compra">

   			</fieldset>

		{{ Form::close() }}	
<<<<<<< HEAD
<<<<<<< HEAD

   	</div>

   </section>


</section>


=======

   	</div>

=======

   	</div>

>>>>>>> 1bd72f4eca0d3ca7198ad84117ecd1a4c4772ad8
   </section>


</section>


<<<<<<< HEAD
>>>>>>> 1bd72f4eca0d3ca7198ad84117ecd1a4c4772ad8
=======
>>>>>>> 1bd72f4eca0d3ca7198ad84117ecd1a4c4772ad8
@else
	<section class="sixteen columns row-fourty left-twenty comparison">
		<h2 align="center">No hay productos en tu carrito de compras :(</h2>
	</section>
@endif

<div class="clearfix"></div>
@stop