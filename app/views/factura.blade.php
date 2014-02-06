@extends('layouts.master')
@section('content')
<div class="max-width">
	<!-- Start row1 -->
	<div class="row">		
		<div class="col-lg-12 bg5">
				<!-- Start heading -->
				<div class="row">
					@if($factura->pago)
						<br/>
						<h1 align="center">Datos de pago enviados, te responderemos a la brevedad posible.</h1>
					@endif
					<div class="col-lg-12 bg2 heading pull-left">
						<h4>Mi Orden de compra:</h4>			
					</div>		
				</div>			
				<!-- End heading -->
				@if(count($factura->items) > 0)
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
							<?php $no=0; $total = 0; ?>
							@if(count($factura->items) > 0)
							@foreach($factura->items as $item)
							<?php $no++; $total+=$item->precio; ?>
							<tr>
								<td>{{ $no }}. </td>
								<td>
									<a href="#"><img src="{{ $item->producto->imagen->imagen }}" class="cart-img" alt=""></a>
									<a href="#" class="item-name">{{ $item->producto->nombre }}</a>
								</td>
								<td> 
									<input type="text" class="cart-qty" value="{{ $item->cantidad }}" disabled />
								</td>
								<td>{{ $item->precio }} Bs</td>
							</tr>
							@endforeach
							@endif

							<tr>
								<td colspan="3" class="cart-bottom">Subtotal :</td>
								<td>{{ $total }} Bs.</td>													
							</tr>

							<tr>
								<td colspan="3" class="text-right bg1"></td>
								<td></td>
							</tr>							  
						</tbody>
					</table>						
				</div>				
				<!-- End Shopping Cart -->


				{{ Form::open(array('url' => '/pagar', 'method' => 'post', 'id' => 'pagar', 'class' => 'validateform', 'enctype' => 'multipart/form-data')) }}
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
								
								<p class="listForm success-lf">
										{{ Form::label('recibo', 'Numero de recibo o transferencia: ') }}
											{{ $factura->pago->recibo }}

											<br/>

										{{ Form::label('monto', 'Monto: ')}}
											{{ $factura->pago->monto }}
											<br/>

										{{ Form::label('fecha', 'Fecha: ') }}
											{{ $factura->pago->fecha }}
											<br/>

		
										{{ Form::label('adjunto', 'Adjunto: ') }}
										<a href="/{{ $factura->pago->adjunto }}" target="_popup">ADJUNTO</a>
										
									</p>	


							@else

								<div class="form-horizontal margintop20">

									<ul class="listForm">
										{{ Form::label('recibo', 'Numero de recibo o transferencia: ', array('class' => 'col-lg-2 control-label')) }}
										<li class="col-lg-8">
											{{ Form::text('recibo', null, array('class' => 'form-block', 'placeholder' =>'Numero de recibo o transferencia', 'data-rule' => "required", 'data-msg' => "Campo obligatorio." )) }}
											<div class="validation"></div>
										</li>

										{{ Form::label('monto', 'Monto: ', array('class' => 'col-lg-2 control-label')) }}
										<li class="col-lg-8">
											{{ Form::text('monto', null, array('class' => 'form-block', 'placeholder' =>'Monto.', 'data-rule' => "required", 'data-msg' => "Campo obligatorio." )) }}
											<div class="validation"></div>
										</li>

										{{ Form::label('fecha', 'Fecha: ', array('class' => 'col-lg-2 control-label')) }}
										<li class="col-lg-8">
											{{ Form::text('fecha', null, array('class' => 'form-block', 'placeholder' =>'dd/mm/aaaa', 'data-rule' => "required", 'data-msg' => "Campo obligatorio." )) }}
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
							<button type="submit" class="btn btn-lg btn-primary">Procesar compra</button>
						</div>		
					</div>
					@endif

					{{ Form::hidden('id', $factura->id )}}
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