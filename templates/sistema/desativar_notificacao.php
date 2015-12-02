<?php 
    if(count($_POST) > 0){
    	$dados['ativa'] = 0;
    	var_dump($_POST);echo '<br /><br />';
    	var_dump($dados);
    	try {
    		if(!update($dados, 'usuário_notificação', '(id_usuário, id_notificação)', '('.$_SESSION['id_usuario'].', '.$_POST['id'].')', false)){
    			throw new Exception(mysql_error(LINK), 113);
    		}
    		ob_clean();
    		header('LOCATION: /'.BASE);
    	} catch (Exception $e) {
    		if($e->getCode() == 113){
    			$titulo = 'Erro no banco de dados!';
	    		$mensagem = str_replace('\'', '´', $e->getMessage());
	    	}
	    	echo '<script type="text/javascript">var titulo = \''.$titulo.'\';</script>';
	    	echo '<script type="text/javascript">var mensagem = \''.$mensagem.'\';</script>';
	    	swal($titulo, $mensagem, 'error', '', 'btn-danger');
    	}
    	
    	
    }
?>