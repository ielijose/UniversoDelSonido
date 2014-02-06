@extends('layouts.admin')

@section('content')
<div class="page-title">	
	<h3>Editar: <span class="semi-bold">{{ $categoria->nombre }} </span></h3>		
</div>

<div id="container">

	{{ Form::open(array('url' => '/panel/categoria/editar' , 'enctype' => 'multipart/form-data')) }}


	<div class="col-md-6">
		<div class="grid simple">
			<div class="grid-title no-border">
			</div>
			<div class="grid-body no-border">
				<div class="input-group">
					<span class="input-group-addon primary">				  
						<span class="arrow"></span>
						<i class="icon-align-justify"></i>
					</span>
					<input type="text" name="nombre" value="{{ $categoria->nombre }}" class="form-control" required="required" placeholder="Nombre de la Categoría">
				</div>
				<br/>
				<img src="/{{ $categoria->portada }}" class="img-responsive">
				<input name="portada" type="file" />

				<br/>
				<input type="color" name="color" value="{{ $categoria->color }}" required="required">
				

				<input type="submit" class="btn btn-primary pull-right" value="Guardar"/>  

				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	{{ Form::hidden('id', $categoria->id  ) }}
	{{ Form::close() }}


</div>
@stop

@section('javascript')
<script type="text/javascript">
$(document).on('ready', function(){
	$(".remove").on("click", function(){
		var id = $(this).data('id');
		$.post('/panel/categoria/borrar/' + id , function(data, textStatus, xhr) {

		});
	});
});
</script>	
@stop

