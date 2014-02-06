<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8" />
  	<title>Administrador || Universo del Sonido</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	@yield('css')
	<!-- BEGIN PLUGIN CSS -->
	<link href="/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
	<link href="/admin/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/admin/assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="/admin/assets/plugins/jquery-morris-chart/css/morris.css" type="text/css" media="screen" charset="utf-8">
	<link href="/admin/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/jquery-superbox/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/admin/assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
	
	<!-- END PLUGIN CSS -->
	<!-- BEGIN CORE CSS FRAMEWORK -->
	<link href="/admin/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
	<!-- END CORE CSS FRAMEWORK -->
	<!-- BEGIN CSS TEMPLATE -->
	<link href="/admin/assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
	<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse "> 
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="header-seperation"> 
				<ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
					<li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
				</ul>
				<!-- BEGIN LOGO -->	
				<a href="/"><img src="/admin/assets/img/logo.png" class="logo"  data-src="/admin/assets/img/logo.png" data-src-retina="assets/img/logo2x.png" width="106" height="21"/></a>
				<!-- END LOGO --> 
			</div>
			<!-- END RESPONSIVE MENU TOGGLER --> 
			<div class="header-quick-nav" > 
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="pull-left"> 
					<ul class="nav quick-section">
						<li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" ><div class="iconset top-menu-toggle-dark"></div> </a> </li>        
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
				<!-- BEGIN CHAT TOGGLER -->
				<div class="pull-right"> 
					<ul class="nav quick-section ">
						<li class="quicklinks"> 
							<a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
								<div class="iconset top-settings-dark "></div> 	
							</a>
							<ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
								<li><a href="/panel/perfil"> Mi Cuenta</a>
								</li>
								<li class="divider"></li>                
								<li><a href="/logout"><i class="icon-off"></i>&nbsp;&nbsp;Salir</a></li>
							</ul>
						</li> 
						<li class="quicklinks"> <span class="h-seperate"></span></li>
					</ul>
				</div>
				<!-- END CHAT TOGGLER -->
			</div> 
			<!-- END TOP NAVIGATION MENU --> 
		</div>
		<!-- END TOP NAVIGATION BAR --> 
	</div>
	<!-- END HEADER --> 
	<!-- BEGIN CONTAINER -->
	<div class="page-container row"> 
		@section('sidebar')
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar" id="main-menu"> 
			<!-- BEGIN MINI-PROFILE -->
			<div class="user-info-wrapper">	
				<div class="user-info">
					<div class="greeting">Bienvenido</div>
					<div class="username">{{ Auth::user()->nombre; }}</div>
				</div>
			</div>
			<!-- END MINI-PROFILE -->
			<!-- BEGIN SIDEBAR MENU -->
			<p class="menu-title"></p>
			<ul>	
				<li class=""> <a href="/panel/gamas"> <i class="icon-custom-form"></i> <span class="title">Gamas</span></a> </li>      
				<li class=""> <a href="/panel/facturas"> <i class="icon-custom-extra"></i>  <span class="title">Facturas</span></a></li>      
			</ul>
			<!-- END SIDEBAR MENU --> 
		</div>
		<!-- END SIDEBAR --> 
		@show
		<!-- BEGIN PAGE CONTAINER-->
		<div class="page-content"> 
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="clearfix"></div>
			<div class="content">  
				@yield('content')
				<!-- END PAGE --> 
			</div>
		</div>		
	</div>
	<!-- END CONTAINER --> 
	<!-- BEGIN CORE JS FRAMEWORK-->
	<script src="/admin/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/breakpoints.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
	<!-- END CORE JS FRAMEWORK -->
	<script src="/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="/admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
	<script src="/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
	<script src="/admin/assets/js/search_results.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<script src="/admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/jquery-mixitup/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="/admin/assets/js/form_elements.js" type="text/javascript"></script>
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/admin/assets/js/core.js" type="text/javascript"></script>
	<script src="/admin/assets/js/demo.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	@yield('javascript')
	<!-- END JAVASCRIPTS -->
	
</body>
</html>