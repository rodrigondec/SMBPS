function log_out(){
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
	  window.location = '/smbps/logout.php';
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

function upper(textbox) {
    textbox.value = textbox.value.toUpperCase();
}

function lower(textbox){
	textbox.value = textbox.value.toLowerCase();
}