<div class='text-center'>
	<h2>Contato</h2>
	<hr />
</div>

<div class='container col-lg-5 center'>
	<div class="alert alert-success alert-dismissible text-center <?php if(!isset($_GET['success'])){ echo 'hidden'; } ?>" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Mensagem enviada com sucesso!</strong> Agradecemos o contato.
	</div>
	<form method='post'>
		<div class='form-group'>
		    <label for='nome'>Nome</label>
		    <input type='nome' name='nome' class='form-control' placeholder='Nome'  required />
		</div>
		<div class='form-group'>
		    <label for='email'>Email</label>
		    <input type='email' name='email' class='form-control' placeholder='Email'  required />
		</div>
		<div class='form-group'>
		    <label for='comentario'>Comentário</label>
		    <textarea rows='5' name="texto" class='form-control' required></textarea>

		</div>
		<div class='text-center'>
			<input type='reset' value='Apagar' class='btn btn-warning' />
			<input type='submit' value='Enviar' class='btn btn-primary' />
		</div>
	</form>
</div>
<?php 
    if(count($_POST) > 0){
    	$_POST['data'] = date('Y-m-d');
    	try {
    		if(!insert($_POST, 'mensagem')){
    			throw new Exception(mysql_error(LINK), 113);
    		}
    		ob_clean();
    		header('LOCATION: '.SISTEMA.'contato?success=1');
    	} catch (Exception $e) {
    		if($e->getCode() == 113){
    			$titulo = 'Erro ao inserir no banco de dados!';
	    		$mensagem = str_replace('\'', '´', $e->getMessage());
	    		swal($titulo, $mensagem, 'error', '', 'btn-danger');
	    	}
    	}
    }
?>