(function($){
	var gamasURL = "/api/gamas",
		actioner = $(".actioner"),
		gamaAction = "post",
		currentGamaID = null;

	getGamas();
/* GAMAS 
    ======================================================================*/
	
	actioner.live('click', function(e){
		e.preventDefault();
		var url = (currentGamaID!=null) ? '/'+currentGamaID : '';
		gamaAction = (currentGamaID!=null) ? 'PUT' : 'POST';
		//alert(gamaAction);
		$.ajax({
	        type: gamaAction,
	        contentType: 'application/json',
	        url: gamasURL+url,
	        dataType: "json",
	        data: formToJSON(),
	        async : false,
	        success: function(data, textStatus, jqXHR){
	        	$("#gama").val('');
	        	actioner.text("Agregar");
	        	currentGamaID = null;
	            getGamas();
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            alert('Error: ' + textStatus);
	        }
	    });
	});	

	$(".updateGama").live('click', function(e){
		e.preventDefault();
	    $.ajax({
			type: 'GET',
			contentType: 'application/json',
			url: gamasURL +'/'+ $(this).data('id'),
	        dataType: "json",
	        async : false,
			success: function(data, textStatus, jqXHR){				
	            $("#gama").val(data[0].gama);
	            actioner.text("Guardar");
	            gamaAction = 'PUT';
	            currentGamaID = data[0].id;
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            alert('Error: ' + textStatus);
	        }
		});
	});

	$(".deleteGama").live('click', function(e){
		e.preventDefault();
	    $.ajax({
			type: 'DELETE',
			url: gamasURL +'/'+ $(this).data('id'),
			success: function(data, textStatus, jqXHR){
	            getGamas();
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            alert('Error: ' + textStatus);
	        }
		});
	});
	/* FUNCTIONS */

	function getGamas() {
	    $.ajax({
	        type: 'GET',
	        url: gamasURL,
	        dataType: "json", // data type of response
	        success: renderList
	    });
	}
	function renderList(data) {		
		list = data;
		$('#gamaList li').remove();
		$.each(list, function(index, gama) {
			var li = '<li><span>'+gama.gama+'</span><span><a href="#" class="updateGama" data-id="'+gama.id+'">Editar</a> - <a href="#" class="deleteGama" data-id="'+gama.id+'">Eliminar</a></span><div class="lineSeparator"></div></li>';
			$('#gamaList').append(li);
		});
	}
	function formToJSON() {
		return JSON.stringify({"gama": $('#gama').val()});
	}

})(jQuery);