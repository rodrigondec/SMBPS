function log_out(){
	swal({
  		title: "",
  		text: "Quer mesmo deslogar?",
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonClass: "btn-danger",
  		confirmButtonText: "logout!",
  		closeOnConfirm: false
	},
	function(){
	  window.location = '/smbps/logout.php';
	});
}

function sa(head, body, tipo, loc){
	if(loc == ''){
		swal(head, body, tipo);
	}
	else{
		swal({
			title: head,
			text: body,
			type: tipo,
			closeOnConfirm: false,
			html: false
		}, 
		function(){
			window.location = loc;
		});
	}
}

function upper(textbox) {
    textbox.value = textbox.value.toUpperCase();
}

function lower(textbox){
	textbox.value = textbox.value.toLowerCase();
}

function validar_email(textbox){
	usuario = textbox.value.substring(0, textbox.value.indexOf("@")); 
	dominio = textbox.value.substring(textbox.value.indexOf("@")+ 1, textbox.value.length); 

	if(!((usuario.length >=1) && 
		(dominio.length >=3) && 
		(usuario.search("@")==-1) && 
		(dominio.search("@")==-1) && 
		(usuario.search(" ")==-1) && 
		(dominio.search(" ")==-1) && 
		(dominio.search(".")!=-1) && 
		(dominio.indexOf(".") >=1) && 
		(dominio.lastIndexOf(".") < dominio.length - 1))) { 
		swal('Email inválido!', 'Favor digite um email válido no campo indicado', 'error');
	} 
}