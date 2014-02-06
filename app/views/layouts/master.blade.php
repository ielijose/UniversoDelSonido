<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.png">
    <title>Joel BlackBerry Zone</title>
	
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Overwrite bootstrap -->
    <link href="/css/overwrite.css" rel="stylesheet">
    <!-- Flexslider style -->
    <link href="/css/flexslider.css" rel="stylesheet">
	<!-- PrettyPhoto style -->
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <!-- Custom style -->    
    <link href="/css/style.css" rel="stylesheet">	
	<!-- Font ->
	<link href='http://fonts.googleapis.com/css?family=Chivo:400,900' rel='stylesheet' type='text/css'>	
	<!-- Color style -->
    <link href="/skin/default.css" rel="stylesheet">
	<!-- color picker -->
	<link href="/css/colorpicker.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	  <script src="/js/html5shiv.js"></script>
	  <script src="/js/respond.min.js"></script>
	<![endif]-->	
  </head>
  <body>
  	@section('header')
	<!-- Header -->
	<header>
		<div class="navbar">
			<div class="max-width">
				<a class="navbar-brand" href="/"><img src="/img/logo.png" alt="" /></a>
				<div class="nav-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown active">
							<li><a href="/">Inicio </a></li>							
						</li>
						@if(count($categorias) > 0)
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
							<ul class="dropdown-menu">
								@foreach($categorias as $categoria)
								<li>
									<a href="/categoria/{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</a>
								</li>
								@endforeach
							</ul>							
						</li>
						@endif
						<li><a href="#">Servicios</a></li>
                    </ul>
				</div>
				<!-- End nav-collapse -->
				
				<div class="right-wrapp @if(Cart::total()==0) hide @endif">								
					<div class="checkout">
						<a href="/carrito" class="cart">Tu compra es de: <span>{{ Cart::total(); }} Bs.</span></a>
					</div>		
				</div>
				
			</div><!-- End container -->
		</div><!-- End navbar -->
	</header>
	<!-- End header -->
	@show
	
	<!-- Start wrapper -->
	<section id="wrapper">
		@yield('content')
	</section>
	<!-- End wrapper -->
	@section('footer')
	<!-- Start footer -->	
	<footer>
		<p class="copyright"><a href="/login">&copy;</a> Copyright JoelBlackerryZone.com.ve - Todos los derechos reservados/ </p>
        <p class="copyright"> Diseño <a href="http://www.puertolab.com.ve">puertoLab</a></p>
		<a href="#" class="contact">Contácto Directo</a>
	</footer>
	<!-- End footer -->
	
	<!-- Start dropdown contact -->	
	<div id="dropdown-contact">		
		<div class="max-width">
			<a href="#" class="contact-close">X</a>
			<div class="row">
				<div class="col-lg-6 visible-lg">
					<div class="box">
						<h4 class="head">Nuestra Tienda<span></span></h4>
										
						<div class="row margintop20">
							<div class="col-lg-12">
								<h5>Joel Blackberry Zone</h5>
								<p>
									<strong>Dirección:</strong><br />
									Sector Buena Vista II<br/>Calle 16-A casa No. 15-03
								</p>
								<p>
									<strong>Teléfonos :</strong><br />
									0414-6576477<br/> 0426-1681338
								</p>
								<p>
								<strong>Correos :</strong><br />
								<a href="mailto:joeloquendo@joelblackberryzone.com.ve">joeloquendo@joelblackberryzone.com.ve</a><br />
								<a href="mailto:simonoquendo@joelblackberryzone.com.ve">simonoquendo@joelblackberryzone.com.ve</a><br />
								<a href="mailto:robertogutierrez@joelblackberryzone.com.ve">robertogutierrez@joelblackberryzone.com.ve</a><br />
								<a href="mailto:ventas@joelblackberryzone.com.ve">ventas@joelblackberryzone.com.ve</a>
								</p>							
							</div>
												
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="box">
						<h4 class="head">Contácto Directo<span></span></h4>
						<form id="contactform" action="/contactar" method="post" class="validateform" name="leaveContact">
															
							<ul class="listForm">
								<li>
									<label>Nombre <span>&#40; Obligatorio &#41;</span></label>
									<input class="form-control" type="text" name="nombre" data-rule="required" data-msg="Tu nombre es importante para nosotros." />									
									<div class="validation"></div>
								</li>
								<li>
									<label>E-Mail <span>&#40; Obligatorio &#41;</span></label>
									<input class="form-control" type="text" name="correo" data-rule="email" data-msg="Escribe un E-Mail válido" />										
									<div class="validation"></div>
								</li>
								<li>
									<label>Que Necesitas <span>&#40; Obligatorio &#41;</span></label>
									<textarea class="form-control" rows="9" name="mensaje" data-rule="required" data-msg="Por favor, indicanos que necesitas"></textarea>												
									<div class="validation"></div>
								</li>
								<li>
									<input type="submit" value="Enviar Mensaje" class="btn btn-default btn-block" name="Submit" />
								</li>
							</ul>
						</form>
					</div>
				</div>				
			</div>
		</div>		
	</div>	
	<!-- End dropdown contact -->
	@show
	
    <!-- JavaScript plugins (requires jQuery) -->
    <script src="/js/jquery.js"></script>
	
	<!-- JavaScript easing plugins -->
	<script src="/js/jquery.easing.1.3.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
	<!-- JavaScript flexslider -->
	<script src="/js/flexslider/jquery.flexslider.js"></script>	
	<script src="/js/flexslider/setting.js"></script>	
	
	<!-- JavaScript ticker -->
	<script src="/js/ticker/ticker.js"></script>	
	<script src="/js/ticker/setting.js"></script>	
	<!-- JavaScript totop 
	<script src="/js/totop/jquery.ui.totop.js"></script>	
	<script src="/js/totop/setting.js"></script>-->
	<!-- prettyPhoto -->
	<script src="/js/prettyPhoto/jquery.prettyPhoto.js"></script>
	<script src="/js/prettyPhoto/setting.js"></script>
	
	<!-- raty -->
	<script src="/js/raty/jquery.raty.min.js"></script>
	<script src="/js/raty/setting.js"></script>
	
	<!-- Contact validation js -->
    <script src="/js/validation.js"></script>
	
	<!-- theme option -->
	<script src="/js/theme-option/colorpicker.js"></script>
	<script src="/js/theme-option/optionspanel.js"></script>
		
	<!-- Custom js -->
    <script src="/js/custom.js"></script>
    @yield('javascript')
  </body>
</html>