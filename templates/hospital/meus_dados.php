<div class='text-center'>
	<h2>Meus dados</h2>
	<hr />
</div>
<?php 
	$senha_inconsistente = false;
	$update['status'] = false;
	$update['banco'] = '';
	$update['id'] = '';
	if(count($_POST) > 0):
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
?>
<!-- CONTINUAR NA PAGINA DO HOSPITAL -->
<script type="text/javascript">
	window.onload = function(){
		show_hospital();
	}
</script>
<?php
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
			update($dados, $update['banco'], 'id', $update['id']);
		}
	endif;
	
	$usuario = select('*', 'usuário', 'id', $_SESSION["id_usuario"]);
	$hospital = select('*', 'hospital', 'id', $_SESSION['id_hospital']);
?>
<div class='container'>
	<!-- MENU DE SELEÇÃO -->
	<div class="list-group text-left col-md-2 col-lg-2 col-sm-2 col-xs-3">
		<a id='nav_usuario' href="#" class="list-group-item active" onclick='show_usuario();'>Usuário</a>
		<a id='nav_hospital' href="#" class="list-group-item" onclick='show_hospital();'>Hospital</a>
	</div>
	<!-- DADOS USUÁRIO -->
	<div id='usuario' class='col-md-5 col-lg-5 col-sm-5 col-xs-6 center'>
		<!-- FORM DADOS -->
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
	                <div class='form-group'>
	                    <label for='email'>Email</label>
	                    <input type='email' name='email' class='form-control' placeholder='Email' value='<?php echo $usuario['email']; ?>' required />
	                </div>
	                <div id='buttons'>
	                    <input type='submit' value='Alterar' class='btn btn-primary' />
	                </div>
	            </form>
			</div>
		</div>
		<!-- FORM SENHA -->
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
	                    <input type='password' name='senha[]' id='senha1' class='form-control' placeholder='Nova Senha' required />
	                </div>
	                <div class='form-group'>
	                    <label for='senha[]'>Repita a Senha</label>
	                    <input type='password' name='senha[]' class='form-control' placeholder='Repetir Senha' required />
	                </div>
	                <div>
	                    <input type='submit' value='Alterar' class='btn btn-primary' onclick="validar()" />
	                </div>
	            </form>
			</div>
		</div>
	</div>
	<!-- DADOS HOSPITAL -->
	<div id='hospital' class='hidden'>
		<!-- FORM HOSPITAL -->
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Informações do Hospital</h3>
			</div>
			<div class="panel-body">
				<form method='post'>
					<input class='hidden' type='text' name='form' value='hospital' />
					<div class='form-group'>
	                    <label for='nome'>Nome</label>
	                    <input type='nome' name='nome' class='form-control' placeholder='Nome' value='<?php echo $hospital['nome']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='cnpj'>CNPJ</label>
	                    <input type='cnpj' name='cnpj' class='form-control' placeholder='CNPJ' value='<?php echo $hospital['cnpj']; ?>'  data-mask='00.000.000/0000-00' required />
	                </div>
	                <div class='form-group'>
	                    <label for='telefone'>Telefone</label>
	                    <input type='telefone' name='telefone' class='form-control' placeholder='Telefone' value='<?php echo $hospital['telefone']; ?>' data-mask='(00) 0000-0000' required />
	                </div>
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
	                <div id='buttons'>
	                    <input type='submit' value='Alterar' class='btn btn-primary' />
	                </div>
	            </form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function show_usuario(){
		$('#usuario').attr('class', 'col-md-5 col-lg-5 col-sm-5 col-xs-6 center')
		$('#hospital').attr('class', 'hidden')

		$('#nav_usuario').attr('class', 'list-group-item active')
		$('#nav_hospital').attr('class', 'list-group-item')
	}

	function show_hospital(){
		$('#usuario').attr('class', 'hidden')
		$('#hospital').attr('class', 'col-md-5 col-lg-5 col-sm-5 col-xs-6 center')

		$('#nav_usuario').attr('class', 'list-group-item')
		$('#nav_hospital').attr('class', 'list-group-item active')
	}
</script>