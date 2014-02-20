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
              
               <ul class="features">
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

           <article class="oneseventh last">
           
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
           
        </section>
        @else
        	<section class="sixteen columns row-fourty left-twenty comparison">
					<h2 align="center">No hay productos en tu carrito de compras :(</h2>
        	</section>
        @endif


<div class="clearfix"></div>

@stop

@section('js')

<!-- Style switcher ================================================== -->
<link rel="stylesheet" href="/assets/js/switcher.css">
<script src="/assets/js/switcher.js"></script>

<script type="text/javascript">
$(document).on('ready', function(){
	jQuery.noConflict();
	jQuery(".be-the-first").on("click", function(){
		jQuery("#nombre" ).focus();
	})
	
});
</script>

@stop