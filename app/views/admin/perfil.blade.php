@extends('layouts.admin')

@section('content')

<div class="page-title">	
	<h3>Joel Blackberry Zone </h3>		
</div>

<div id="container">

	<div class="row">
		<div class="col-md-6">
			<div class="grid simple">				
				<div class="grid-body no-border">
					<div class="row-fluid">

						{{ Form::open(array('url' => '/panel/perfil', 'class' => 'form-no-horizontal-spacing', 'id' => 'form-condensed')) }}

						<h3>Editar <span class="semi-bold">Perfil</span></h3>
						<div class="input-group">
							<span class="input-group-addon success">
								<i class="icon-asterisk"></i>
							</span>
							<input type="text" required="required" class="form-control" placeholder="Nombre" name="nombre" value="{{ $usuario->nombre }}">
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon primary">				  
								<i class="icon-user"></i>
							</span>
							<input type="text" required="required" class="form-control" placeholder="Usuario" name="username" value="{{ $usuario->username }}">
						</div>
						
				
						<div class="form-actions">  
							<div class="pull-right">
								<button type="submit" class="btn btn-primary btn-cons"><i class="icon-ok"></i>&nbsp;Guardar</button>
							</div>
						</div>
						{{ Form::close() }}


					</div>
				</div>
			</div>
		</div>


		<div class="col-md-6">
			<div class="grid simple">				
				<div class="grid-body no-border">
					<div class="row-fluid">

						{{ Form::open(array('url' => '/panel/password', 'class' => 'form-no-horizontal-spacing', 'id' => 'change-password')) }}

						<h3>Cambiar <span class="semi-bold">Contraseña</span></h3>
						<div class="input-group">
							<span class="input-group-addon danger">
								<i class="icon-lock"></i>
							</span>
							<input type="password" class="form-control" placeholder="Nueva contraseña" name="pass1" id="pass1">
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon danger">				  
								<i class="icon-unlock"></i>
							</span>
							<input type="password" class="form-control" placeholder="Confirmar contraseña" name="pass2" id="pass2">
						</div>

						<div class="pull-right">
							<span class="error"><label class="error"></label></span>
						</div>


						<div class="form-actions">  
							<div class="pull-right">
								<button type="submit" class="btn btn-danger btn-cons"><i class="icon-warning-sign"></i>&nbsp;Cambiar Contraseña</button>
							</div>
						</div>
					
						{{ Form::close() }}


					</div>
				</div>
			</div>
		</div>

	</div>

</div> 

@stop

@section('javascript')

	<script type="text/javascript">

	$(document).on('ready', function(){
		$("#change-password").on("submit", function(event){
			//event.preventDefault();
			var p1 = $("#pass1").val(), p2 = $("#pass2").val();
			debugger;
			if( (p1 == p2) && (p1.length > 0 && p2.length > 0) ){
				$("label.error").text("");
				return true;
			}else{
				$("label.error").text("Las contraseñas no coinciden o estan vacias.");
				return false;
			}


		});
	});

	</script>

@stop