@extends('layouts.public')

@section('slider')
<section id="noslider" class="sixteen columns headerContent" data-layout="blur">

	<div id="blurMask">
		<canvas id="blurCanvas"></canvas>
	</div>

	<div class="headerContentContainer">
		<div class="pageTitle">{{ $producto->nombre }}</div> 
	</div>           
</section>
@stop

@section('content')



<div class="contentBgFull"></div>

<!-- Tag Line ================================================== -->

<div id="tagLineShadow" class="sixteen columns"></div>

<!-- Portfolio items ================================================== -->


<section class="portfolioSingle twelve columns clearfix">



	<section class="portfolioContent row">

		<div class="portfolioDesc eight columns">
			<h2>Caracter&iacute;sticas</h2>
			<p>{{ $producto->descripcion }}</p>
		</div>

		<div class="portfolioDetails four columns">
			<h4>Precio:</h4>
			<h4><a href="#" class="highlight" style="font-size:22px"> {{ $producto->precio }} Bs.</a></h4>

			<h4>Gama:</h4>
			<h4><a href="#" class="highlight" style="font-size:18px"> {{ $producto->gama['nombre'] }}</a></h4>
            <ul class="customButtons">
               <li class="button ecommerce pushdown"><a href="#">COMPRAR</a></li>
             </ul>
		</div>
	</section>


	<!-- separator ================================================== -->

	<div class="lineSeparator  twelve columns row"></div>

	@if(count($relacionados)>0)
	<!-- Featured works ================================================== -->
	<section class="twelve columns remove-left">
		<div class="sectionHeader row clearfix">
			<div class="sectionHeadingWrap">
				<span class="sectionHeading">SIMILARES</span>
			</div>		
		</div>

		<div class="carouselWrapper small">
			<ul class="carousel portfolio" data-autoPlay="false">
				<!-- Start carousel item portfolio -->
				@foreach($relacionados as $relacionado)

				<li>
					<figure>
						<a class="jackbox">
							<img width="161" height="122" src="{{ $relacionado->imagen['imagen'] }}" alt="" />
							<span class="portfolioImageOver transparent"></span>
						</a>
					</figure>

					<article data-targetURL="portfolio-single.html">
						<p>{{ $relacionado->nombre }}</p>
						<span>- {{ $relacionado->gama['nombre'] }} -</span>
					</article>

					<!-- Sample div used as an item's description, will only appear inside JackBox -->
					<div class="jackbox-description" id="description_1">
						<h3>Description Title One</h3>
					</div>

					<span class="carouselArrow"></span>
				</li>
				@endforeach
				<!-- /End carousel item portfolio -->
			</ul>
			<div class="clearfix"></div>
		</div>


	</section><!-- End // Featured works -->
	@endif

	<section class="comments sixteen columns" id="">

		<div class="sectionHeader row clearfix">
			<div class="sectionHeadingWrap">
				<span class="sectionHeading">COMENTARIOS</span>
			</div>
		</div>
		<br><br><br>
        

		<section class="row twelve columns remove-left" data-toggle="true">


			@if(count($producto->comentarios) > 0)
				@foreach($producto->comentarios as $comentario)
<div class="divider large"></div>
					<article class="row">
						<div class="question">
							<strong>{{ $comentario['nombre'] }} </strong>
						</div>
						<p>{{ $comentario['comentario'] }}</p>
						<div class="separator"></div>
					</article>					
				@endforeach
			@else
				<h2>Aun no hay comentarios acerca de este artículo.<br>Se el <a href="javascript:void(0)" class="be-the-first">primero</a> en decir algo.</h2>
			@endif
		</section>

	</section>



</section><!-- End // portfolio single content -->

<aside class="sidebar four columns">

	<!-- widget ================================================== -->

	<div class="onefourth">

		<div class="textWidget clearfix">
			<img src="{{ $producto->imagen['imagen'] }}" width="225" height="170">
		</div>

	</div>

	<!-- widget ================================================== -->

	@if(count($producto->imagenes) > 0)

	<div class="onefourth">
		<div class="textWidget clearfix">
			<ul>
				@foreach($producto->imagenes as $imagen)
				<li class="imgP">
					<a href="#">
						<img width="71" height="71" src="{{ $imagen['imagen'] }}" alt="" />
					</a>
					<div class="borderHover"></div>
				</li>
				@endforeach

			</ul>
		</div>
	</div>
	@endif

	{{ Form::open(array('url' => '/comentar', 'method' => 'post', 'id' => 'comentar', 'class' => 'margintop20 validateform')) }}
		{{ Form::label('nombre', 'Nombre:') }}
		{{ Form::text('nombre', null, array('placeholder' =>'Campo Obligatorio', 'required' => "required")) }}

		{{ Form::label('email', 'Email::') }}
		{{ Form::text('email', null, array('placeholder' =>'nombre@correo.com', 'required' => 'required' )) }}

		{{ Form::label('comentario', 'Comentario:') }}
		{{ Form::textarea('comentario', null, array('placeholder' =>'Campo Obligatorio', 'required' => "required")) }}

		<button type="submit" class="button normal light pushdown">Enviar Comentario</button>					
	{{ Form::hidden('id', $producto->id)}}
	{{ Form::close() }}	

</aside>

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