@extends('layouts.public')
@section('slider')
<!-- For data-layout, you can choose between a color background like that "#aaa", "blur" or "image" -->
<section id="noslider" class="sixteen columns headerContent" data-layout="blur">

	<div id="blurMask">
		<canvas id="blurCanvas"></canvas>
	</div>

	<div class="headerContentContainer">
		<div class="pageTitle">Cont<span class="highlight">ácto</span></div>
	</div>

</section>
@stop
@section('content')
<div class="contentBgFull"></div>
<div id="tagLineShadow" class="sixteen columns"></div>        
        <!-- Main content
        ================================================== --> 
        <section class="twelve columns clearfix contact">          
        	<section class="contactForm">
        		<h2>Contáctanos</h2>

        		<div id="contact">

        			<div id="message"></div>

        			<form method="post" action="/contactar" name="contactform" id="">

        				<fieldset>

        					<input name="nombre" type="text" id="name" size="30" placeholder="NOMBRE*" required="required"/>


        					<input name="correo" type="text" id="email" size="30" placeholder="EMAIL*" required="required"/>


        					<textarea name="mensaje" cols="40" rows="3" id="comments" placeholder="MENSAJE*" required="required"></textarea>


        					<input type="submit" class="submit button normal dark" id="submit" value="ENVIAR MENSAJE" />


        				</fieldset>

        			</form>

        		</div>

        	</section>


        </section><!-- End // main content -->

        <aside class="sidebar four columns">

               <!-- side menu
               ================================================== -->
               
               <section class="contactInfo row">

               	<article class="contactInfoItem">

               		<header>
               			<div>Dirección</div>
               			<div class="headerBg"></div>
               		</header>

               		<ul>
               			<li>Av. Francisco de Miranda.</li>
               			<li>Edificio Las Luisas - Oficina 6B - Piso 6</li>
               		</ul>

               	</article>

               	<article class="contactInfoItem">

               		<header>
               			<div>Teléfonos</div>
               			<div class="headerBg"></div>
               		</header>

               		<ul>
               			<li>0426-2120199</li>
               			<li>0414-3183109</li>
               		</ul>

               	</article>

               	<article class="contactInfoItem">

               		<header>
               			<div>Email</div>
               			<div class="headerBg"></div>
               		</header>

               		<ul>
               			<li><a href="mailto:office@wiseguys.com">ventas@eluniversodelsonido.com.ve</a></li>
               		</ul>

               	</article>


               </section>               

           </aside>

           <div class="clearfix"></div>


           @stop