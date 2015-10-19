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