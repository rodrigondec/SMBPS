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

    	$bool = true;

    	$bool = $bool && insert($_POST, 'mensagem');

		$admins = select_many('id', 'usuário', 'id_papel', '1');

    	$mensagem_id = select('id', 'mensagem', 'texto', $_POST['texto'])['id'];

    	$notificacao['título'] = 'Nova mensagem cadastrada';
    	$notificacao['texto'] = 'A mensagem de id '.$mensagem_id.' foi cadastrada por '.$_POST['nome'].' em '.$_POST['data'].'. O email para contato cadastrado foi '.$_POST['email'].'.';
    	
    	$bool = $bool && insert($notificacao, 'notificação');

    	$notificacao['id'] = select('id', 'notificação', 'texto', $notificacao['texto'])['id'];

    	$usuario_noticacao = array();
    	foreach ($admins as $num => $admin){
    		foreach ($admin as $key => $value) {
    			if($key == 'id'){
    				$key = 'id_usuário';
    				$usuario_noticacao[$num][$key] = $value;
    			}
    		}
    		$usuario_noticacao[$num]['id_notificação'] = $notificacao['id'];
    	}
    	
    	foreach ($usuario_noticacao as $key => $value) {
    		$bool = $bool && insert($value, 'usuário_notificação');
    	}

    	if($bool){
    		ob_clean();
			header('LOCATION: '.SISTEMA.'contato?success=1');
    	}
    }
?>