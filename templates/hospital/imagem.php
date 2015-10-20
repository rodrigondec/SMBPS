<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">


	<input type='date' name='data' required/>
	<input type='file' name='imagem' enctype="multipart/form-data" required />
	<button>Enviar</button>



</form>
<?php 
	if(count($_FILES) > 0){
		try{
	        upload();
	        
	        // inserir no banco de dados a referencia
	        var_dump($_FILES);echo '<br /><br />';
	        var_dump($_POST);echo '<br /><br />';
	        $dados['nome'] = $_FILES['imagem']['name'];
	        insert($dados, 'imagem', LINK);
	        unset($dados);
	        $dados['id_indicador'] = 1; // NUMERO A SER PEGO DO FORMULARIO <<<<<<<<<<<
	        $dados['id_imagem'] = select('id', 'imagem', 'nome', $_FILES['imagem']['name'], LINK)['id'];
	        $dados['id_hospital'] = $_SESSION['hospital'];
	        $dados['data'] = $_POST['data'];
	        insert($dados, 'protocolo', LINK);
	        var_dump($dados);echo '<br /><br />';


	        echo '<p>Thank you for submitting</p>';
        }
	    catch(Exception $e){
	        echo '<h4>'.$e->getMessage().'</h4>';
        }
        
	}    
?>