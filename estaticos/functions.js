function log_out(base){
	swal({
  		title: "Deseja mesmo sair?",
  		text: "",
  		type: "warning",
  		showCancelButton: true,
  		cancelButtonClass: "btn-primary",
  		cancelButtonText: "Cancelar",
  		confirmButtonClass: "btn-danger",
  		confirmButtonText: "sair!",
  		closeOnConfirm: false
	},
	function(){
	  window.location = '/'+base+'logout.php';
	});
}

function sa(head, body, tipo, loc, btn){	
	if(loc == ''){
		swal({
			title: head,
			text: body,
			type: tipo,
			closeOnConfirm: false,
			confirmButtonClass: btn,
			html: false
		});
	}
	else{
		swal({
			title: head,
			text: body,
			type: tipo,
			closeOnConfirm: false,
			confirmButtonClass: btn,
			html: false
		}, 
		function(){
			window.location = loc;
		});
	}
}

function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;

    codeLatLng(lat, lng)
}

function codeLatLng(lat, lng) {
	geocoder = new google.maps.Geocoder();
  	var latlng = new google.maps.LatLng(lat, lng);
  	geocoder.geocode({latLng: latlng}, function(results, status) {
	    if (status == google.maps.GeocoderStatus.OK) {
	      	if (results[1]) {
	        	var arrAddress = results;
	        	$.each(arrAddress, function(i, address_component) {
	          		if (address_component.types[0] == "locality") {
	            		$('#cidade').attr('value', address_component.address_components[0].long_name)
	            		itemLocality = address_component.address_components[0].long_name;
	          		}
	        	});
	      	} 
	      	else {
	        	alert("No results found");
	      	}
	    } 
	    else {
	      	alert("Geocoder failed due to: " + status);
	    }
  	});
}

function pegar_cidade(){
	var geocoder;
  	
	//Get the latitude and the longitude;
	if (navigator.geolocation){
    	navigator.geolocation.getCurrentPosition(successFunction);
	} 
}

function show_hide_cidade(valor){
	// console.log(valor);
	for (id = 1; id <= num_estados; id++){
		if(id == valor){
			// HIDE TODOS OS SELECTS
			for (j = 1; j <= num_estados; j++) {
				$("#div_select_cidade"+j).attr('class', 'form-group hidden')
				$("#select_cidade"+j).attr('required', false)
			}
			// SHOW SELECIONADO
			$("#div_select_cidade"+id).attr('class', 'form-group')
			$("#select_cidade"+id).attr('required', true)
		}
	}
}

function show_hide_protocolo(valor){
	for(id = 1; id <= num_indicadores; id++){
		if(id == valor){
			// HIDE TODOS OS SELECTS
			for (j = 1; j <= num_indicadores; j++) {
				$('#nav_indicador_'+j).attr('class', 'list-group-item')
				$('#indicador_'+j).attr('class', 'col-md-5 col-lg-5 col-sm-5 col-xs-6 center hidden')
			}
			// SHOW SELECIONADO
			$('#nav_indicador_'+id).attr('class', 'list-group-item active')
			$('#indicador_'+id).attr('class', 'col-md-5 col-lg-5 col-sm-5 col-xs-6 center')
		}
	}
}

function show_hide_perguntas_indicador(valor, check){
	for(id = 1; id <= num_indicadores; id++){
		if(id == valor){
			// SHOW SELECIONADO
			if(check){
				$('#indicador_'+id).attr('class', '')
			}
			else{
				$('#indicador_'+id).attr('class', 'hidden')
			}
			
		}
	}
}

function show_usuario(){
	$('#usuario').attr('class', 'col-md-5 col-lg-5 col-sm-5 col-xs-6 center')
	$('#hospital').attr('class', 'hidden')

	$('#nav_usuario').attr('class', 'list-group-item active')
	$('#nav_hospital').attr('class', 'list-group-item')
}

function show_hospital(){
	$('#usuario').attr('class', 'hidden')
	$('#hospital').attr('class', 'col-md-5 col-lg-5 col-sm-5 col-xs-6 center')

	$('#nav_usuario').attr('class', 'list-group-item')
	$('#nav_hospital').attr('class', 'list-group-item active')
}

function show_notificacoes(){
	$('#notificacoes').attr('class', 'table-responsive col-lg-9 center')
	$('#usuario_notificacoes').attr('class', 'hidden')

	$('#nav_notificacoes').attr('class', 'list-group-item active')
	$('#nav_usuario_notificacoes').attr('class', 'list-group-item')
}

function show_usuario_notificacoes(){
	$('#notificacoes').attr('class', 'hidden')
	$('#usuario_notificacoes').attr('class', 'table-responsive col-lg-9 center')

	$('#nav_notificacoes').attr('class', 'list-group-item')
	$('#nav_usuario_notificacoes').attr('class', 'list-group-item active')
}