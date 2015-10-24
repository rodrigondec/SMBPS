<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">


	<input type='date' name='data' required/>
	<input type='file' name='imagem' enctype="multipart/form-data" required />
	<button>Enviar</button>



</form>
<?php 
	if(count($_FILES) > 0){
		try{
			$upload = upload();
			// var_dump($upload);
	        if($upload['status']){
	        	// inserir no banco de dados a referencia da imagem e protocolo
		        
		        $dados['nome'] = $_FILES['imagem']['name'];
		        insert($dados, 'imagem');

		        unset($dados);
		        $dados['id_indicador'] = 1; // NUMERO A SER PEGO DO FORMULARIO <<<<<<<<<<<
		        $dados['id_imagem'] = select('max(id)', 'imagem')['max(id)'];
		        $dados['id_hospital'] = $_SESSION['hospital'];
		        $dados['data'] = $_POST['data'];
		        insert($dados, 'protocolo');

		        echo end($upload['mensagem']['info']);
		        swal('Envio realizado com sucesso', end($upload['mensagem']['info']), 'success', '/'.BASE);
		        
	        }
	        else{
	        	throw new Exception(end($upload['mensagem']['error']));
	        }        
        }
	    catch(Exception $e){
	    	swal('Erro no envio', 'Sua imagem não foi enviada.\nError: '.$e->getMessage(), 'error', '/'.BASE, 'btn-primary');
        }
        
	}    
?>