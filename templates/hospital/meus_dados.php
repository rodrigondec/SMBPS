<div class='text-center'>
	<h2>Meus dados</h2>
	<hr />
</div>
<?php 
	$senha_inconsistente = false;

	if(count($_POST) > 0):

		$update['status'] = false;
		$update['banco'] = '';
		$update['id'] = '';

		if($_POST['form'] == 'dados'):
			$update['banco'] = 'usuário';
			$update['status'] = true;
			$update['id'] = $_SESSION["id_usuario"];
		elseif($_POST['form'] == 'senha'):
			if($_POST['senha'][0] == $_POST['senha'][1]):
				$update['banco'] = 'usuário';
				$update['status'] = true;
				$update['id'] = $_SESSION["id_usuario"];

				$_POST['senha'] = md5($_POST['senha'][0]);
			else:
?>
<!-- DAR SCROLL PARA O FORM DA SENHA COM A MENSAGEM DE ERRO -->
<script type="text/javascript">
	window.onload = function(){
		$('html, body').animate({
        	'scrollTop' : $("#form_senha").position().top
    	})
	}
</script>
<?php
				$senha_inconsistente = true;
			endif;
		elseif($_POST['form'] == 'hospital'):
			$update['banco'] = 'hospital';
			$update['status'] = true;
			$update['id'] = $_SESSION["id_hospital"];
		else:
			exit("ERROR!");
		endif;

		/* UPDATE DOS DADOS */
		if($update['status']){

			$dados = array();

			foreach ($_POST as $key => $value) {
				if($key != 'form'){
					$dados[$key] = retirar_mascara($key, $value);
				}
			}
			
			try {
				if(!update($dados, $update['banco'], 'id', $update['id'])){
					throw new Exception(mysql_error(LINK), 113);
				}
				ob_clean();
    			header('LOCATION: '.HOSPITAL.'meus_dados');
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
	endif;
	
	$usuario = select('*', 'usuário', 'id', $_SESSION["id_usuario"]);
	$hospital = select('*', 'hospital', 'id', $_SESSION['id_hospital']);
?>
<div class='container'>
<div class='row'>
	<!-- MENU DE SELEÇÃO -->
	<div class="list-group col-lg-2 col-md-2 col-sm-2 col-xs-4">
		<a id='nav_usuario' href="#" class="list-group-item active" onclick='show_usuario();'>Usuário</a>
		<a id='nav_hospital' href="#" class="list-group-item" onclick='show_hospital();'>Hospital</a>
	</div>
	<!-- DADOS USUÁRIO -->
	<div id='usuario' class='col-lg-10 col-md-10 col-sm-10 col-xs-8'>
		<!-- FORM DADOS -->
		<div class='row'>
		<div class='col-lg-5 col-md-6 col-sm-6'>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Informações do Usuário</h3>
			</div>
			<div class="panel-body">
				<form method='post'>
					<input class='hidden' type='text' name='form' value='dados' />
					<div class='form-group'>
	                    <label for='nome'>Nome</label>
	                    <input type='nome' name='nome' class='form-control' placeholder='Nome' value='<?php echo $usuario['nome']; ?>' required />
	                </div>
	                <div id='div_email' class='form-group'>
	                    <label for='email'>Email</label>
	                    <input type='email' name='email' class='form-control' placeholder='Email' value='<?php echo $usuario['email']; ?>' required />
	                </div>
	                <div id='buttons'>
	                    <input type='submit' value='Alterar' class='btn btn-primary' />
	                </div>
	            </form>
			</div>
		</div>
		</div>
		<!-- FORM SENHA -->
		<div class='col-lg-6 col-md-6 col-sm-6'>
        <div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Mudar Senha</h3>
			</div>
			<div class="panel-body">
				<?php if($senha_inconsistente): ?>
				<div class="alert alert-danger alert-dismissible text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p><strong>Senhas não coincidem!</strong></p>Tente novamente
                </div>
            	<?php endif; ?>
				<form method='post' id='form_senha'>
					<input class='hidden' type='text' name='form' value='senha' />
	            	<div class='form-group'>
	                    <label for='senha[]'>Nova Senha</label>
	                    <input type='password' name='senha[]' class='form-control' placeholder='Nova Senha' required />
	                </div>
	                <div class='form-group'>
	                    <label for='senha[]'>Repita a Senha</label>
	                    <input type='password' name='senha[]' class='form-control' placeholder='Repetir Senha' required />
	                </div>
	                <div id='button_senha'>
	                    <input type='reset' value='Apagar' class='btn btn-danger' />
                        <input type='submit' value='Alterar' class='btn btn-primary' />
	                </div>
	            </form>
			</div>
		</div>
		</div>
		</div>
	</div>
	<!-- DADOS HOSPITAL -->
	<div id='hospital' class='col-lg-10 col-md-10 col-sm-10 col-xs-8 hidden'>
		<!-- FORM HOSPITAL -->
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Informações do Hospital</h3>
			</div>
			<div class="panel-body">
				<div class='row'>
				<form method='post'>
					<input class='hidden' type='text' name='form' value='hospital' />
					<div class='col-lg-6 col-md-6 col-sm-6'>
					<div class='form-group'>
	                    <label for='nome'>Nome</label>
	                    <input type='nome' name='nome' class='form-control' placeholder='Nome' value='<?php echo $hospital['nome']; ?>' required />
	                </div>
	                <div id='div_cnpj' class='form-group'>
	                    <label for='cnpj'>CNPJ</label>
	                    <input type='cnpj' name='cnpj' class='form-control' placeholder='CNPJ' value='<?php echo $hospital['cnpj']; ?>'  data-mask='00.000.000/0000-00' required />
	                </div>
	                <div class='form-group'>
	                    <label for='telefone'>Telefone</label>
	                    <input type='telefone' name='telefone' class='form-control' placeholder='Telefone' value='<?php echo $hospital['telefone']; ?>' data-mask='(00) 0000-0000' required />
	                </div>
	                </div>
	                <div class='col-lg-6 col-md-6 col-sm-6'>
	                <div class='form-group'>
	                    <label for='endereço'>Endereço</label>
	                    <input type='endereço' name='endereço' class='form-control' placeholder='Enedereço' value='<?php echo $hospital['endereço']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='complemento'>Complemento</label>
	                    <input type='complemento' name='complemento' class='form-control' placeholder='Complemento' value='<?php echo $hospital['complemento']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='cep'>CEP</label>
	                    <input type='cep' name='cep' class='form-control' placeholder='CEP' value='<?php echo $hospital['cep']; ?>' data-mask='00.000-000' required />
	                </div>
	                </div>
	                <div class='text-center'>
	                    <input type='submit' value='Alterar' class='btn btn-primary' />
	                </div>
	            </form>
	            </div>
			</div>
		</div>
	</div>
</div>
</div>