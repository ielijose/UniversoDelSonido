@extends('layouts.public')

@section('slider')
<!-- For data-layout, you can choose between a color background like that "#aaa", "blur" or "image" -->
<section id="noslider" class="sixteen columns headerContent" data-layout="blur">
  
  <div id="blurMask">
    <canvas id="blurCanvas"></canvas>
  </div>
  
  <div class="headerContentContainer">
   <div class="pageTitle">Noso<span class="highlight">tros</span></div>
 </div>
 
</section>
@stop

@section('content')
<div class="contentBgFull"></div>

<!-- Tag Line ================================================== -->
<section id="tagLine" class="sixteen columns row">
	@if(isset($msg))
	<h1>{{ $msg }} </h1>
	@else
	<h1>Comercializamos los <span class="highlight">mejores</span> productos de <span class="highlight">iluminaci&oacute;n</span> y <span class="highlight">audio</span> profesional.</h1>
	@endif
</section>

<div id="tagLineShadow" class="sixteen columns"></div>

<section class="row offset-by-one">

	<div class="onethird">
		<img class="half-bottom" src="/assets/images/home/offer/1.png" alt="" />
		<h4 class="aligncenter">QUIENES SOMOS</h4>
		<p class="aligncenter">El Universo del  sonido  esta dispuesta a ofrecerle una  excelente variedad de equipos profesionales, de  audio e iluminación de alta calidad para  brindarle a toda nuestra distinguida clientela.<br>
			Nuestro equipo de trabajo de El Universo  del Sonido,  trabaja día a día para  brindarle asesoramiento de nivel profesional, además contamos con una gran  variedad de productos de las mejores marcas al mejor precio para satisfacer las  exigencias de nuestros clientes.
		</p>
		<p class="aligncenter">&nbsp;</p>
	</div>

	<div class="onethird">
		<img class="half-bottom" src="/assets/images/home/offer/2.png" alt="" />
		<h4 class="aligncenter">NUESTRA FOLOSOFÍA</h4>
		<p class="aligncenter">Es entender las necesidades planteadas por nuestros  clientes, en base a un producto o servicio determinado. Estudiamos a fondo las  bondades, del producto y a su vez los deseos y exigencias de nuestra  distinguida clientela. Somos capaces de crear un espacio importante para sus  productos profesionales dentro de las exigencias.</p>
	</div>

	<div class="onethird last">
		<img class="half-bottom" src="/assets/images/home/offer/3.png" alt="" />
		<h4 class="aligncenter">NUESTRO EQUIPO</h4>
		<p class="aligncenter">Está conformado por profesionales emprendedores con  mística de trabajo y siempre estaremos dispuesto de ofrecerle lo mejor de  nuestra empresa, para lograr resultados óptimos y satisfacer sus necesidades  con ideas creativas y estrategias efectivas en el ámbito musical.</p>
	</div>

</section>


@stop