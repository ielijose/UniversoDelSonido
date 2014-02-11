@extends('layouts.public')

@section('slider')
<!-- Header content ================================================== -->
<!-- For data-layout, you can choose between a color background like that "#aaa", "blur" or "image" -->
<section id="slider" class="sixteen columns headerContent">


	<div class="bannercontainer">					
		<section id="slider" class="sixteen columns headerContent">


			<div class="bannercontainer">					
				<div class="banner">
					<ul>

						<!-- SLIDE -->
						<li data-transition="boxfade" data-slotamount="5"  data-thumb="images/other_images/img53.jpg"> 		
							<img src="/assets/images/opaque_slides/1.jpg" alt="">	

							<div class="caption lfl" data-x="30" data-y="248" data-speed="900" data-start="100" data-easing="easeOutExpo"><h1>?????????????</h1></div>	
							<div class="caption lfl" data-x="30" data-y="290" data-speed="900" data-start="400" data-easing="easeOutExpo"><p class="whitebg">????????? ??????? ??????? ??????? ????????.<br />?????????? ?????????? ? ? ? ? ????????????????????? ???????? ?? ????????? ????? ?????? ?????? ?????? ????? ??????.</p></div>	
						</li>

						<!-- SLIDE -->
						<li data-transition="boxfade" data-slotamount="5"  data-thumb="images/other_images/img53.jpg"> 		
							<img src="/assets/images/opaque_slides/2.jpg" alt="">	

							<div class="caption lfl" data-x="30" data-y="248" data-speed="900" data-start="100" data-easing="easeOutExpo"><h1>?????????????</h1></div>	
							<div class="caption lfl" data-x="30" data-y="290" data-speed="900" data-start="400" data-easing="easeOutExpo"><p class="whitebg">????????? ??????? ??????? ??????? ????????.<br />?????????? ?????????? ? ? ? ? ????????????????????? ???????? ?? ????????? ????? ?????? ?????? ?????? ????? ??????.</p></div>	
						</li>

						<!-- SLIDE -->
						<li data-transition="boxfade" data-slotamount="5"  data-thumb="images/other_images/img53.jpg"> 		
							<img src="/assets/images/opaque_slides/3.jpg" alt="">	

							<div class="caption lfl" data-x="30" data-y="248" data-speed="900" data-start="100" data-easing="easeOutExpo"><h1>????????????????</h1></div>	
							<div class="caption lfl" data-x="30" data-y="290" data-speed="900" data-start="400" data-easing="easeOutExpo"><p class="whitebg">?????????? ?????? ????? ??????? ???????? ??????? ?????????????.<br />????????? ?????? ?????? ??????? ??????? ?? ?????????.</p></div>	
						</li>


					</ul>	
					<div class="tp-bannertimer"></div>												
				</div>					
			</div>

		</section>					
	</div>

</section>
@stop
@section('content')
	<div class="contentBgFull"></div>

	<!-- Tag Line ================================================== -->
	<section id="tagLine" class="sixteen columns row">
		<h1>Comercializamos los <span class="highlight">mejores</span> productos de <span class="highlight">iluminaci&oacute;n</span> y <span class="highlight">audio</span> profesional.</h1>
	</section>

	<div id="tagLineShadow" class="sixteen columns"></div>

	<!-- Isotope filters ================================================== -->


	<section class="isotopeFilters clearfix">

		@if(count($categorias) > 0)
		<ul class="option-set clearfix" data-option-key="filter">
			@foreach($categorias as $categoria)
			<li><a href="#" data-filter=".{{ $categoria->nombre }}">{{ $categoria->nombre }}</a></li>
			@endforeach
		</ul>
		@endif
		<!-- Responsive Filters ================================================== -->


	</section> <!-- end isotope filters -->

	<!-- Isotope container ================================================== -->

	<section class="isotopeContainer portfolio left-twenty">

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

	<?php echo $productos->links(); ?>


@stop