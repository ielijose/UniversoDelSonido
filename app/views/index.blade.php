@extends('layouts.master')
@section('content')
	<div class="max-width">
			@if(isset($msg))
			<br/>
			<h1 align="center"> {{ $msg }} </h1>
			@endif
		@if(count($categorias) > 0)	
			<?php $count = 0; ?>
			@foreach ($categorias as $categoria)
				
				@if ($count == 0)
				<!-- Start row {{ $count }} -->
				<div class="row">
				@endif	
					<div class="col-lg-6 wrapper-bg bg1 portadas" style="background-color: {{ $categoria->color }};">
						<span class="frame-hover"></span>
						<div class="row">
							<div class="col-lg-7 aligncenter">
								<img src="{{ $categoria->portada }}" class="img-responsive portada-categoria" alt="{{ $categoria->nombre }}" />
							</div>					
							<div class="col-lg-5">
								<div class="box">								
									<h4>{{ $categoria->nombre }}</h4>
									<a href="/categoria/{{ $categoria->id }}" class="btn btn-sm">Ver</a>
								</div>
							</div>
							
						</div>
					</div>	
				<?php $count++; ?>	
				@if ($count == 2)
				</div>			
				<!-- End row1 -->
				<?php $count = 0; ?>
				@endif
			@endforeach
		@else
			<h3>No hay categorias.</h3>
		@endif
	</div>
@stop