@extends('layouts.master')
@section('content')
<div class="max-width">
	<!-- Start pagination -->
	<div class="row">
		<div class="col-lg-12 bg6 pull-right pagination-wrapp">
			<div class="heading head-categoria pull-left">
				<h4> Carrito de compras </h4>
			</div>	
		</div>
	</div>
	<!-- End pagination -->
	
	<!-- Start row1 -->
	<div class="row">		
		<div class="col-lg-4 aligncenter">
			<div class="wrapper-bg">
				<span class="frame-hover"></span>				
				<img src="img/about/img1.jpg" class="img-responsive" alt="" />
			</div>
			<div class="wrapper-bg">
				<span class="frame-hover"></span>					
				<img src="img/about/img3.jpg" class="img-responsive" alt="" />
			</div>
			<div class="wrapper-bg">
				<span class="frame-hover"></span>					
				<img src="img/about/img5.jpg" class="img-responsive" alt="" />
			</div>										
		</div>
		<div class="col-lg-8 bg5">
				<!-- Start heading -->
				<div class="row">
					<div class="col-lg-12 bg2 heading pull-left">
						<h4>Mis Productos</h4>			
					</div>		
				</div>			
				<!-- End heading -->
				@if(count($cart) > 0)
				<!-- Start Shopping Cart -->
				<div class="shopping-cart bg3">
					<table class="table marginbot-clear">
						<thead>
							<tr>
								<th>No</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; ?>
							@foreach($cart as $item)
							<?php $no++; ?>
							<tr>
								<td>{{ $no; }}. </td>
								<td>
									<a href="#"><img src="{{ $item->options->image }}" class="cart-img" alt=""></a>
									<a href="#" class="item-name">{{ $item->name }}</a>
								</td>
								<td> 
									<a href="/cart/minus/{{ $item->rowid }}" class="cart-change minus">- </a> 
									<input type="text" class="cart-qty" value="{{ $item->qty }}" disabled />
									<a href="/cart/plus/{{ $item->rowid }}" class="cart-change plus"> +</a> 
								</td>
								<td>{{ $item->price }} Bs<a href="/cart/remove/{{ $item->rowid }}" class="remove-cart">x</a></td>
							</tr>
							@endforeach

							<tr>
								<td colspan="3" class="cart-bottom">Subtotal :</td>
								<td>{{ Cart::total(); }} Bs.</td>													
							</tr>

							<tr>
								<td colspan="3" class="text-right bg1">
								</td>
								<td></td>
							</tr>							  
						</tbody>
					</table>						
				</div>				
				<!-- End Shopping Cart -->


				{{ Form::open(array('url' => '/procesar', 'method' => 'post', 'id' => 'procesar', 'class' => 'validateform')) }}
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

							<div class="form-horizontal margintop20">

								<ul class="listForm">
									{{ Form::label('nombre', 'Nombre: ', array('class' => 'col-lg-2 control-label')) }}
									<li class="col-lg-8">
										{{ Form::text('nombre', null, array('class' => 'form-block', 'placeholder' =>'Ingresa tu nombre.', 'data-rule' => "required", 'data-msg' => "Campo obligatorio." )) }}
										<div class="validation"></div>
									</li>

									{{ Form::label('telefono', 'Teléfono: ', array('class' => 'col-lg-2 control-label')) }}
									<li class="col-lg-8">
										{{ Form::text('telefono', null, array('class' => 'form-block', 'placeholder' =>'Ingresa tu número teléfonico.', 'data-rule' => "minlen:11", 'data-msg' => "Campo obligatorio." )) }}
										<div class="validation"></div>
									</li>

	
									{{ Form::label('correo', 'Correo: ', array('class' => 'col-lg-2 control-label')) }}
									<li class="col-lg-8">
										{{ Form::text('correo', null, array('class' => 'form-block', 
												'placeholder' =>'Ingresa tu correo electronico.', 'data-rule' => "email", 
												'data-msg' => "Ingrese un correo valido." )) }}
										<div class="validation"></div>
									</li>

									{{ Form::label('direccion', 'Dirección de envio: ', array('class' => 'col-lg-2 control-label')) }}
									<li class="col-lg-8">
										{{ Form::text('direccion', null, array('class' => 'form-block', 
												'placeholder' =>'Ingresa tu dirección de envio.', 'data-rule' => "required", 
												'data-msg' => "Campo obligatorio." )) }}
										<div class="validation"></div>
									</li>
								</ul>																
							</div>	
							
						</div>
					</div>
					<!-- End billing address -->
					<!-- Start cart action -->
					<div class="row">
						<div class="col-lg-12 bg2 cart-action">
							<button type="submit" class="btn btn-lg btn-primary">Procesar compra</button>
						</div>		
					</div>
				{{ Form::close() }}	
				<!-- End cart action -->
				@else
				<br/>
					<h2 align="center">No hay productos en tu carrito de compras :(</h2>
				@endif
		</div>				
	</div>			
	<!-- End row1 -->	
	
	<!-- Start social network -->
	<!-- End social network -->				
</div>
@stop