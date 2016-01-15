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
	for(var id = 1; id <= num_estados; id++){
		if(id == valor){
			// HIDE TODOS OS SELECTS
			for (var j = 1; j <= num_estados; j++) {
				$("#div_select_cidade"+j).addClass('hidden')
				$("#select_cidade"+j).attr('required', false)
			}
			// SHOW SELECIONADO
			$("#div_select_cidade"+id).removeClass('hidden')
			$("#select_cidade"+id).attr('required', true)
		}
	}
}

function show_hide_protocolo(valor){
	for(var id = 1; id <= num_indicadores; id++){
		if(id == valor){
			// HIDE TODOS OS SELECTS
			for (var j = 1; j <= num_indicadores; j++) {
				$('#nav_indicador_'+j).removeClass('active')
				$('#indicador_'+j).addClass('hidden')
			}
			// SHOW SELECIONADO
			$('#nav_indicador_'+id).addClass('active')
			$('#indicador_'+id).removeClass('hidden')
		}
	}
}

function show_hide_perguntas_indicador(valor, check){
	for(var id = 1; id <= num_indicadores; id++){
		if(id == valor){
			// SHOW SELECIONADO
			if(check){
				$('#indicador_'+id).removeClass('hidden')
			}
			else{
				$('#indicador_'+id).addClass('hidden')
			}
			
		}
	}
}

function show_usuario(){
	$('#usuario').removeClass('hidden')
	$('#hospital').addClass('hidden')

	$('#nav_usuario').addClass('active')
	$('#nav_hospital').removeClass('active')
}

function show_hospital(){
	$('#usuario').addClass('hidden')
	$('#hospital').removeClass('hidden')

	$('#nav_usuario').removeClass('active')
	$('#nav_hospital').addClass('active')
}

function show_notificacoes(){
	$('#notificacoes').removeClass('hiden')
	$('#usuario_notificacoes').addClass('hidden')

	$('#nav_notificacoes').addClass('active')
	$('#nav_usuario_notificacoes').removeClass('active')
}

function show_usuario_notificacoes(){
	$('#notificacoes').addClass('hiden')
	$('#usuario_notificacoes').removeClass('hidden')

	$('#nav_notificacoes').removeClass('active')
	$('#nav_usuario_notificacoes').addClass('active')
}

function validar_senha(){
	if($('#senha1').val() == '' || $('#senha2').val() == ''){
		return;
	}
	if($('#senha1').val() == $('#senha2').val()){
		$('#group_senha1').removeClass('has-error')
		$('#group_senha1').addClass('has-success')
		
		$('#group_senha2').removeClass('has-error')
		$('#group_senha2').addClass('has-success')

		$('#icon_senha1').removeClass('fa-minus')
		$('#icon_senha1').removeClass('fa-times')
		$('#icon_senha1').addClass('fa-check')

		$('#icon_senha2').removeClass('fa-minus')
		$('#icon_senha2').removeClass('fa-times')
		$('#icon_senha2').addClass('fa-check')
	}
	else if($('#senha1').val() != $('#senha2').val()){
		$('#group_senha1').removeClass('has-success')
		$('#group_senha1').addClass('has-error')

		$('#group_senha2').removeClass('has-success')
		$('#group_senha2').addClass('has-error')

		$('#icon_senha1').removeClass('fa-minus')
		$('#icon_senha1').removeClass('fa-check')
		$('#icon_senha1').addClass('fa-times')

		$('#icon_senha2').removeClass('fa-minus')
		$('#icon_senha2').removeClass('fa-check')
		$('#icon_senha2').addClass('fa-times')
	}
}

function validar_cnpj() {
 	
	var cnpj = $('#cnpj').val()

    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == ''){
    	return false;
    } 
    
    try {
	    if (cnpj.length != 14){
	        throw "CNPJ inválido";
	    }

        tamanho = cnpj.length - 2
	    numeros = cnpj.substring(0,tamanho);
	    digitos = cnpj.substring(tamanho);
	    soma = 0;
	    pos = tamanho - 7;
	    for (i = tamanho; i >= 1; i--) {
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2){
				pos = 9;
			}
	    }
	    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	    if (resultado != digitos.charAt(0)){
	        throw "CNPJ inválido";
	    }
	         
	    tamanho = tamanho + 1;
	    numeros = cnpj.substring(0,tamanho);
	    soma = 0;
	    pos = tamanho - 7;
	    for (i = tamanho; i >= 1; i--) {
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2){
				pos = 9;
			}
	    }
	    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	    if (resultado != digitos.charAt(1)){
	    	throw "CNPJ inválido";
	    }	     

	    $('#group_cnpj').removeClass('has-error')
		$('#group_cnpj').addClass('has-success')

		$('#icon_cnpj').removeClass('fa-minus')
		$('#icon_cnpj').removeClass('fa-times')
		$('#icon_cnpj').addClass('fa-check')

	    return true;
	}
	catch(err){
		$('#group_cnpj').removeClass('has-success')
		$('#group_cnpj').addClass('has-error')

		$('#icon_cnpj').removeClass('fa-minus')
		$('#icon_cnpj').removeClass('fa-check')
		$('#icon_cnpj').addClass('fa-times')

		return false;
	}
}

function alert_cnpj_invalido(){
	if(!validar_cnpj()){
		swal({
			title: 'CNPJ inválido!',
			text: 'Favor verificar o CNPJ inserido',
			type: 'error',
			confirmButtonClass: 'btn-danger'
		});
	}
}