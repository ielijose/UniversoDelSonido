@extends('layouts.admin')

@section('css')
<!-- BEGIN PLUGIN CSS -->
<link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->
@stop 

@section('content')

<div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4>Lista de <span class="semi-bold">Facturas</span></h4>
      </div>
      <div class="grid-body ">   
        <table class="table table-hover table-condensed" id="example">
          <thead>
            <tr>

              <th width="10%">Nombre</th>
              <th width="22%" data-hide="phone,tablet">Direccion</th>
              <th width="6%">Total Bs.</th>
              <th width="10%" data-hide="phone,tablet">Ver mas</th>
            </tr>
          </thead>
          <tbody>
            @foreach($facturas as $factura)
            <tr >

              <td valign="middle">{{ $factura->nombre }} @if(!$factura->pago) <span class="label label-important">PENDIENTE!</span> @endif </td>
              <td valign="middle"><span class="muted">{{ $factura->direccion }}</span></td>
              <td><span class="muted">{{ $factura->total() }}</span></td>
              <td valign="middle">
                <a href="/factura/{{ $factura->slug }}" class="btn btn-danger"><i class="icon-paste"></i> Ver</a>
              </td>
            </tr>
            @endforeach


          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
@stop
@section('javascript')
<script src="/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="/assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="/assets/js/datatables.js" type="text/javascript"></script>

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
