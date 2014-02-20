@extends('layouts.public')

@section('slider')
<section id="noslider" class="sixteen columns headerContent" data-layout="blur">

	<div id="blurMask">
		<canvas id="blurCanvas"></canvas>
	</div>

	<div class="headerContentContainer">
		<div class="pageTitle">{{ $categoria->nombre }}</div> 
	</div>           
</section>
@stop

@section('content')
	<div class="contentBgFull"></div>


	<div id="tagLineShadow" class="sixteen columns"></div>

	<!-- Isotope container ================================================== -->
	@if(count($productos) > 0)
	<section class=" portfolio left-twenty">

		<!-- producto --> 
		
			@foreach($productos as $producto)
			<div class="element onefourth {{ $producto->gama['nombre'] }}">

				<div class="portfolioImage">
					<a class="jackbox" href="/producto/{{ $producto->id }}">
						<div class="jackbox-hover jackbox-hover-blur jackbox-hover-magnify"></div>

						<div class="img">
							<img width="225" src="{{ $producto->imagen['imagen'] }}" alt="" />
						</div>
						<span class="portfolioImageOver transparent"></span>
					</a>
				</div>


				<div class="portfolioText" data-targetURL="portfolio-single.html">
					<span class="portfolioTextOver transparent"></span>
					<p>{{ $producto->nombre }}</p>
					<span>- {{ $producto->gama['nombre'] }} -</span>
				</div>

				<span class="portfolioArrow"></span>
			</div>
			@endforeach



		<!-- producto --> 
	</section>
	@else

	<section class="sixteen columns row-fourty left-twenty comparison">
			<h2 align="center">No hay productos en esta gama.</h2>
	</section>	
	@endif

	<?php echo $productos->links(); ?>


@stop