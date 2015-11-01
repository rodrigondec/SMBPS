<div class='text-center centered-30'>
	<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id='.$indicador['id'];?>" method="post">
		<div class='form-group text-left'>
			<label for="data">Data</label>
			<!-- <span class="input-group-addon" id="basic-addon1">Data</span>			 -->
			<input class='form-control' type='date' name='data' required/>
		</div>
		<div class='form-group text-left'>
			<label for="data">imagem</label>
		<input id="input-1" type="file" class="file" name='imagem' enctype="multipart/form-data" required />
		<!-- <input class='btn btn-primary' type='submit' value='Enviar' /> -->
		</div>
	</form>
</div>
<?php 
	if(count($_FILES) > 0){
		try{
			$upload = upload();
			// var_dump($upload);
	        if($upload['status']){
	        	// inserir no banco de dados a referencia da imagem e protocolo
		        
	        	$dados['ativo'] = '0';
	        	update($dados, 'protocolo', '(id_hospital, id_indicador, ativo)', '('.$_SESSION['hospital'].', '.$_GET['id'].', \'1\')', false);
	        	unset($dados);

		        $dados['nome'] = $_FILES['imagem']['name'];
		        insert($dados, 'imagem');

		        unset($dados);
		        $dados['id_indicador'] = $indicador['id'];
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