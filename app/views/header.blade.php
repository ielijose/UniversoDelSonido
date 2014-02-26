<div class="headerContentBgBoxed hidden"></div>
<header class="sixteen columns">

	<a href="/"><div class="logo"></div></a>

	<nav class="mainmenu">
		<div id="smoothmenu" class="ddsmoothmenu">
			<ul>
				<li><a href="/">INICIO<span>- Inicio -</span></a></li>
				<li><a href="/nosotros">NOSOTROS<span>- con&oacute;cenos -</span></a></li>
				<li>
					<a href="#">PRODUCTOS<span>- gran variedad -</span></a>
					@if(count($categorias) > 0)
					<ul>
						@foreach($categorias as $categoria)
						<li><a href="/gama/{{ $categoria->id }}" class="current">{{ $categoria->nombre }}</a></li>
						@endforeach
					</ul>
					@endif	
				</li>
				<li><a href="/contacto">CONTÁCTO<span>- estamos en cont&aacute;cto -</span></a></li>
				@if(Cart::total() > 0)
				<li>
					<a href="/carrito"  class="current">TU COMPRA ES DE:<span>- {{ Cart::total() }} Bs. -</span></a>
				</li>
				@endif
			</ul>
			<br style="clear: left" />
		</div><!-- end ddsmoothmenu -->

		 <!-- Responsive Menu
		 ================================================== -->

		 <form action="#" method="post" style="display: none;">
		 	<select>
		 		<option value="">-- MENU --</option>
		 		
		 	</select>	 		
		 </form>

		</nav>

	</nav>
	<span id="menuShadow"></span>
	<span id="submenuArrow"><span class="arrow-up"></span></span>
</header>