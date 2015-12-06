<div class='text-center'>
	<h2>Cadastro</h2>
	<hr />
</div>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	pegar_cidade();
</script>
<?php 
    if(count($_POST) > 0){
    	//var_dump($_POST);
    	try {
    		$dados = array();
    		foreach ($_POST as $key => $value) {
    			if($key == 'nome_usuario' || $key == 'email' || $key == 'senha'){
    				if($key == 'nome_usuario'){
    					$key = 'nome';
    				}
    				else if($key == 'senha'){
    					$value = md5($value);
    				}
    				$dados['usuário'][$key] = $value;
    			}
    			else{
    				if($key == 'nome_hospital'){
    					$key = 'nome';
    				}
    				else if($key == 'cidade_str'){
    					$key = 'id_cidade';
    					$id_cidade = select('id', 'cidade', 'nome', $value)['id'];echo '<br /><br />';
    				}
    				$dados['hospital'][$key] = retirar_mascara($key, $value);
    			}
	    	}

	    	$dados['usuário']['id_papel'] = select('id', 'papel', 'nome', 'Gestor Hospitalar')['id'];echo '<br /><br />';
	    	$dados['hospital']['id_cidade'] = $id_cidade;

	    	// var_dump(validar_cnpj($_POST['cnpj']));
	    	/* CNPJ INVÁLIDO */
	    	/*if(!validar_cnpj($_POST['cnpj'])){
	    		throw new Exception('O CNPJ ´'.$_POST['cnpj'].'´ é inválido', 100);
	    	}*/

	    	/* EMAIL DUPLICADO */
	    	/*$usuario = select('*', 'usuário', 'email', $_POST['email']);
	    	if($usuario){
	    		throw new Exception('O email ´'.$_POST['email'].'´ já está em uso', 102);
	    	}*/

	    	/* CNPJ DUPLICADO */
	    	/*$hospital = select('*', 'hospital', 'cnpj', $dados['hospital']['cnpj']);
	    	if($hospital){
	    		throw new Exception('O CNPJ ´'.$_POST['cnpj'].'´ já está em uso', 101);
	    	}*/

	    	/* MYSQL INSERT USUÁRIO E HOSPITAL */
	    	foreach ($dados as $key => $value) {
	    		insert($dados[$key], $key);
	    	}

	    	$id_usuario = select('max(id)', 'usuário')['max(id)'];

	    	unset($dados);
	    	$dados = array();
	    	$dados['id_hospital'] = select('max(id)', 'hospital')['max(id)'];
	    	/* MYSQL UPDATE ID ACESSO HOSPITAL DO USUÁRIO */
    		if(update($dados, 'usuário', 'id', $id_usuario)){
    			$bool = true;

    			$bool = $bool && cadastrar_hospital_setor($dados['id_hospital']);
    			$id_hospital = $dados['id_hospital'];

    			$notificacao['título'] = 'Novo cadastro no sistema';
    			$notificacao['texto'] = "O usuário de id $id_usuario solicitou seu cadastro e o cadastro do hospital de id $id_hospital no sistema. Favor verificar o status desse usuário e desse hospital e ativar os registros.";

    			$seletor['identificador'] = 'id_papel';
    			$seletor['valor'] = '1';

    			$bool = $bool && cadastrar_notificacoes_para_usuarios($notificacao, $seletor, 'select_many');

    			if($bool){
		    		ob_clean();
					header('LOCATION: '.SISTEMA.'cadastro?success=1');
		    	}
    		}
    	} catch (Exception $e){
    		/* CNPJ INVÁLIDO */
    		if($e->getCode() == 100){
    			$titulo = 'CNPJ inválido!';
    			$mensagem = $e->getMessage();
    		}
    		/* CNPJ DUPLICADO */
    		else if($e->getCode() == 101){
    			$titulo = 'CNPJ duplicado!';
	    		$mensagem = $e->getMessage();
	    	}
	    	/* EMAIL DUPLICADO */
    		else if($e->getCode() == 102){
    			$titulo = 'Email duplicado!';
	    		$mensagem = $e->getMessage();
	    	}
	    	echo "<script type='text/javascript'>var titulo = '$titulo';</script>";
	    	echo "<script type='text/javascript'>var mensagem = '$mensagem';</script>";
?>
<script type="text/javascript">
	window.onload = function(){
		if(titulo == 'CNPJ inválido!' || titulo == 'CNPJ duplicado!'){
			swal({
				title: titulo,
				text: mensagem,
				type: 'error',
				confirmButtonClass: 'btn-danger',
				html: false
			}, 
			function(){
				$('#erro_cnpj').attr('class', 'alert alert-danger alert-dismissible')
				$('#titulo_erro_cnpj').html(titulo)
			});
		}
		else if(titulo == 'Email duplicado!'){
			swal({
				title: titulo,
				text: mensagem,
				type: 'error',
				confirmButtonClass: 'btn-danger',
				html: false
			}, 
			function(){
				$('#erro_email').attr('class', 'alert alert-danger alert-dismissible')
				$('#titulo_erro_email').html(titulo)
			});
		}
	}
</script>
<?php
    	}
    }
	$estados = select_many('id, nome, uf', 'estado');
	foreach ($estados as $key => $estado){
		$estados[$key]['cidades'] = select_many('id, nome', 'cidade', 'id_estado', $estado['id']);
	}
	$num_estados = count($estados);
	echo "<script type='text/javascript'>var num_estados = $num_estados;</script>";
?>
<div class='container col-md-6 col-lg-6 col-sm-6 col-xs-7 center' method='post'>
	<div class="alert alert-success alert-dismissible text-center <?php if(!isset($_GET['success'])){ echo 'hidden'; } ?>" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div><strong>Cadastro realizado com sucesso!</strong></div>Seu registro será validado por um dos administradores do sistema.
	</div>
	<form method='post'>
		<div class="panel panel-primary">
			<div class="panel-heading">
			    <h3 class="panel-title">Informações do Usuário</h3>
			</div>
			<div class="panel-body">
			    <div class='form-group'>
				    <label for='nome'>Nome</label>
				    <input type='text' name='nome_usuario' class='form-control' placeholder='Nome' value='<?php if(count($_POST) > 0){echo $_POST['nome_usuario'];} ?>'  required />
				</div>
				<div class='form-group'>
					<div id='erro_email' class="alert alert-danger alert-dismissible hidden" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div><strong id='titulo_erro_email'></strong></div>Verifique o email e tente novamente.
					</div>
				    <label for='email'>Email</label>
				    <input type='email' name='email' class='form-control' placeholder='Email' value='<?php if(count($_POST) > 0){echo $_POST['email'];} ?>' required />
				</div>
				<div class='form-group'>
				    <label for='senha'>Senha</label>
				    <input type='password' name='senha' class='form-control' placeholder='Senha' value='<?php if(count($_POST) > 0){echo $_POST['senha'];} ?>' required />
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
			    <h3 class="panel-title">Informações do Hospital</h3>
			</div>
			<div class="panel-body">
			    <div class='form-group'>
				    <label for='cidade'>Cidade</label>
				    <input type='text' name='cidade_str' id='cidade' class='form-control' readonly required />
				</div>
				<div class='form-group'>
					<label for='nome'>Nome</label>
					<input class='form-control' type='text' name='nome_hospital' placeholder='Nome' value='<?php if(count($_POST) > 0){echo $_POST['nome_hospital'];} ?>' required />
				</div>
				<div class='form-group hidden'>
					<label for='select_estado'>Estado</label>
					<div onclick='show_hide_cidade($("#select_estado").selectpicker("val"))'>
					<select id='select_estado' class='form-control selectpicker' data-style="btn-info" data-live-search='true'>
						<option disabled selected value=''>Selecione um estado</option>
						<?php 
						    foreach ($estados as $key => $estado):
						?>
						<option value='<?php echo $estado['id']; ?>'>
							<?php echo $estado['nome']?>
						</option>
						<?php
						    endforeach;
						?>
					</select>
					</div>
				</div>
				<?php
				    foreach ($estados as $key => $estado):
				?>
				<div id='div_select_cidade<?php echo $estado['id']; ?>' class='form-group hidden'>
					<label for='id_cidade'>Cidade (<?php echo $estado['nome'] ?>)</label>
					<select id='select_cidade<?php echo $estado['id']; ?>' class='form-control selectpicker' data-style="btn-info" data-live-search='true' name='id_cidade'>
						<option value='' disabled selected>Selecione uma cidade</option>
						<?php 
							foreach ($estado['cidades'] as $key2 => $cidade):
						?>
						<option value='<?php echo $cidade['id']; ?>'>
							<?php echo $cidade['nome']; ?>
						</option>
						<?php endforeach; ?>
					</select>
				</div>
				<?php 
				    endforeach;
				?>
				<div class='form-group'>
					<label for='cnpj'>CNPJ</label>
					<div id='erro_cnpj' class="alert alert-danger alert-dismissible hidden" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div><strong id='titulo_erro_cnpj'></strong></div>Verifique o CNPJ e tente novamente.
					</div>
					<input class='form-control' type='text' name='cnpj' data-mask='00.000.000/0000-00' placeholder='CNPJ' value='<?php if(count($_POST) > 0){echo $_POST['cnpj'];} ?>' pattern='^[0-9]{2}\.[0-9]{3}\.[0-9]{3}/[0-9]{4}-[0-9]{2}' title='xx.xxx.xxx/xxxx-xx' required />
				</div>
				<div class='form-group'>
					<label for='telefone'>Telefone</label>
					<input class='form-control' type='text' name='telefone' data-mask='(00) 0000-0000' placeholder='Telefone' value='<?php if(count($_POST) > 0){echo $_POST['telefone'];} ?>' pattern='^\([0-9]{2}\) [0-9]{4}-[0-9]{4}' title='(xx) xxxx-xxxx' required />
				</div>
				<div class='form-group'>
					<label for='endereço'>Endereço</label>
					<input class='form-control' type='text' name='endereço' placeholder='Endereço' value='<?php if(count($_POST) > 0){echo $_POST['endereço'];} ?>' required />
				</div>
				<div class='form-group'>
					<label for='cep'>CEP</label>
					<input class='form-control' type='text' name='cep' data-mask='00.000-000' placeholder='CEP' value='<?php if(count($_POST) > 0){echo $_POST['cep'];} ?>' pattern="^[0-9]{2}\.[0-9]{3}-[0-9]{3}" title='xx.xxx-xxx' required />
				</div>
			</div>
		</div>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Entrar</button>
		</div>
	</form>
</div>