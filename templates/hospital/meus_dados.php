<div class='text-center'>
	<h2>Meus dados</h2>
	<hr />
</div>
<?php 
	$senha_inconsistente = false;
	if(count($_POST) > 0):
		echo 'POST:<br />';
		if($_POST['campo'] == 'dados'):
			$dados['nome'] = $_POST['nome'];
			$dados['email'] = $_POST['email'];
			update($dados, 'usuário', 'id', $_SESSION["id_usuario"]);
		elseif($_POST['campo'] == 'senha'):
			if($_POST['senha'][0] == $_POST['senha'][1]):
				$dados['senha'] = md5($_POST['senha'][0]);
				update($dados, 'usuário', 'id', $_SESSION["id_usuario"]);
			else:
?>
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
		elseif($_POST['campo'] == 'hospital'):
?>
<script type="text/javascript">
	window.onload = function(){
		show_hospital();
	}
</script>
<?php
			var_dump($_POST);
		else:
			exit("ERROR!");
		endif;
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
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Informações do Usuário</h3>
			</div>
			<div class="panel-body">
				<form method='post'>
					<input class='hidden' type='text' name='campo' value='dados' />
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
        <div class="panel panel-default">
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
					<input class='hidden' type='text' name='campo' value='senha' />
	            	<div class='form-group'>
	                    <label for='senha[]'>Nova Senha</label>
	                    <input type='password' name='senha[]' id='senha1' class='form-control' placeholder='Sua Nova Senha' required />
	                </div>
	                <div class='form-group'>
	                    <label for='senha[]'>Repita a Senha</label>
	                    <input type='password' name='senha[]' class='form-control' placeholder='Repetir A Senha' required />
	                </div>
	                <div>
	                    <input type='submit' value='Alterar' class='btn btn-info' onclick="validar()" />
	                </div>
	            </form>
			</div>
		</div>
	</div>
	<!-- DADOS HOSPITAL -->
	<div id='hospital' class='hidden'>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Informações do Hospital</h3>
			</div>
			<div class="panel-body">
				<form method='post'>
					<input class='hidden' type='text' name='campo' value='hospital' />
					<div class='form-group'>
	                    <label for='nome'>Nome</label>
	                    <input type='nome' name='nome' class='form-control' placeholder='Nome' value='<?php echo $hospital['nome']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='cnpj'>Cnpj</label>
	                    <input type='cnpj' name='cnpj' class='form-control' placeholder='Nome' value='<?php echo $hospital['cnpj']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='telefone'>Telefone</label>
	                    <input type='telefone' name='telefone' class='form-control' placeholder='Nome' value='<?php echo $hospital['telefone']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='endereço'>Endereço</label>
	                    <input type='endereço' name='endereço' class='form-control' placeholder='Nome' value='<?php echo $hospital['endereço']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='complemento'>Complemento</label>
	                    <input type='complemento' name='complemento' class='form-control' placeholder='Nome' value='<?php echo $hospital['complemento']; ?>' required />
	                </div>
	                <div class='form-group'>
	                    <label for='cep'>Cep</label>
	                    <input type='cep' name='cep' class='form-control' placeholder='Email' value='<?php echo $hospital['cep']; ?>' required />
	                </div>
	                <div id='buttons'>
	                    <input type='submit' value='Alterar' class='btn btn-primary' />
	                </div>
	            </form>
			</div>
		</div>
		<?php 
		    var_dump($hospital);echo '<br /><br />';
		?>
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