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
		else{

		}
	}
}