<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="es"> <![endif]-->
<!--[if IE 9 ]><html class="ie9" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs ================================================== -->
	<meta charset="utf-8">
	<title>El Universo del Sonido</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS ================================================== -->
	<link rel="stylesheet" href="/assets/rs-plugin/css/settings.css"/>
	<link rel="stylesheet" href="/assets/css/base.css"/>
	<link rel="stylesheet" href="/assets/css/skeleton.css"/>
	<link rel="stylesheet" href="/assets/css/layout.css"/>
	<link rel="stylesheet" href="/assets/jackbox/css/jackbox_hovers.css"/>
	<link rel="stylesheet" href="/assets/jackbox/css/jackbox.css"/>    
	<!-- Colors -->
	<link id="colorTheme" rel='stylesheet' href='/assets/css/colors/orangeTheme.css'/>  

	@yield('css') 

	
	<link rel="shortcut icon" href="/assets/images/icons/favicon.ico">
	<link rel="apple-touch-icon" href="/assets/images/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/images/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/images/icons/apple-touch-icon-114x114.png">
</head>
<body>

	<div class="headerBg"></div>   
	<!-- Primary Page Layout ================================================== -->
	<div class="container" data-backgroundType="image" data-backgroundImage="/assets/images/backgrounds/custom2.jpg">
		
		@include('header')



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

		<section class="mainContent">

			@yield('content')

		</section><!-- End // main content -->



		@include('footer')

		

	</div><!-- container -->


<!-- End Document
	================================================== -->

	<!-- JS ================================================== -->
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/assets/js/tiny.accordion.min.js"></script>
	<script type="text/javascript" src="/assets/js/jacked.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.easing.1.3.min.js"></script>
	<script type="text/javascript" src="/assets/js/slackBlur.min.js"></script>
	<script type="text/javascript" src="/assets/js/ddsmoothmenu.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.tweet.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="/assets/jackbox/js/libs/jquery.address-1.5.min.js"></script>
	<script type="text/javascript" src="/assets/jackbox/js/jackbox-swipe.min.js"></script>
	<script type="text/javascript" src="assets/jackbox/js/jackbox.min.js"></script>
	<script type="text/javascript" src="/assets/jackbox/js/libs/StackBlur.min.js"></script>
	<script type="text/javascript" src="/assets/js/tipsy/jquery.tipsy.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.flexslider.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.fitvids.min.js"></script>
	<script type="text/javascript" src="/assets/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="/assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="/assets/js/wiseguys.min.js"></script>
	<!-- Favicons ================================================== -->

	@yield('js')


</body>
</html>
