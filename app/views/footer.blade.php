<!-- Start footer -->
<footer>

	<div class="footerBgFull"></div>
	<div class="subFooterBgFull"></div>
	<div class="arrow-down"></div>


	<!-- Top footer ================================================== -->
	<section class="footerTop sixteen columns">


		<div class="footerTopWrapper">

			<div class="onefourth logoFooter">
				<a href="index.html"><div class="footerLogo"></div></a>

				 @if (Auth::user())
                 <a href="/panel/"><div class="footerLogoActive"></div></a>
				 @else
					<form action="/login" method="post" class="nlform" >
						<input class="nlfield" type="input"  name="username" id="user" placeholder="Usuario"  />
						<input class="nlfield" type="password"  name="password" id="pass" placeholder="Contraseña" />
						<input type="submit" class="nlbutton" name="submit" id="submit" value=" "/>
						<input type="hidden" name="action" value="login"/>
					</form>
				@endif
			</div>

			<div class="onefourth contactDetails">
				<h4>ESTAMOS EN CONTÁCTO</h4>

				<ul class="footerContacts">
					<li class="footerAddress">Direcci&oacute;n</li>
					<li class="footerPhone">0034 556.445.623</li>
					<li class="footerMail"><a href="mailto:office@wiseguys.com">contacto@eluniversodelsonido.com</a></li>
				</ul>

				<ul class="socialIcons">
					<li class="facebook"><a href="https://www.facebook.com/universo.delsonido?fref=ts" target="_blank">Facebook</a></li>
					<li class="twitter"><a href="http://www.twitter.com/unisonido" target="_blank">Twitter</a></li>
					<li class="youtube"><a href="http://www.youtube.com" target="_blank">YouTube</a></li>
				</ul>

			</div>

			<div class="onefourth aboutFooter">
				<h4>ALIADOS</h4>
				<ul class="footerAbout">
					<li><a href="#">JBL</a></li>
					<li><a href="#">????</a></li>
					<li><a href="#">???????</a></li>
					<li><a href="#">???</a></li>
					<li><a href="#">????</a></li>
					<li><a href="#">????</a></li>
				</ul>
			</div>

			<div class="onefourth footerTweets">
				<h4>TWITTER</h4>
				<div class="tweets"></div>
			</div>

		</div>

	</section><!-- End // Footer top -->

	<!-- Sub footer ================================================== -->
	<section class="subFooter">           


		<ul class="footerMenu">
			<li><a href="index.html">INICIO</a></li>
			<li><a href="nosotros.html">NOSOTROS</a></li>
			<li><a href="#">PRODUCTOS</a></li>
			<li><a href="contacto.html">CONT&Aacute;CTO</a></li>
		</ul>

		<span class="copyright">Derechos reservados &copy; El Universo del Sonido {{ date('Y') }}</span>


	</section>

</footer>
		<!-- /End footer -->