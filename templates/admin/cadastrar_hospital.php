<div class='text-center'>
	<h2>Cadastrar Hospital</h2>
	<hr />
</div>
<?php 
    if(count($_POST) > 0){
    	//var_dump($_POST);
    	try {
    		foreach ($_POST as $key => $value) {
    			$_POST[$key] = retirar_mascara($key, $value);
	    	}

	    	// var_dump(validar_cnpj($_POST['cnpj']));
	    	/* CNPJ INVÁLIDO */
	    	/*if(!validar_cnpj($_POST['cnpj'])){
	    		throw new Exception('O CNPJ ´'.$_POST['cnpj'].'´ é inválido', 100);
	    	}*/

	    	/* CNPJ DUPLICADO */
	    	$hospital = select('*', 'hospital', 'cnpj', $_POST['cnpj']);
	    	if($hospital){
	    		throw new Exception('O CNPJ ´'.$_POST['cnpj'].'´ já está em uso', 101);
	    	}

	    	insert($_POST, 'hospital');
	    		
	    	$bool = true;

	    	$id_hospital = select('max(id)', 'hospital')['max(id)'];

	    	$bool = $bool & cadastrar_hospital_setor($id_hospital);

			$notificacao['título'] = 'Novo cadastro no sistema';
			$notificacao['texto'] = 'O administrador geral de id '.$_SESSION['id_usuario'].' cadastrou o hospital de id '.$id_hospital.' no sistema.';

			$seletor['identificador'] = 'id_papel';
			$seletor['valor'] = '1';

			$bool = $bool && cadastrar_notificacoes_para_usuarios($notificacao, $seletor, 'select_many');

			if($bool){
	    		ob_clean();
				header('LOCATION: '.ADMIN.'listar_hospitais');
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
	    	echo '<script type="text/javascript">var titulo = \''.$titulo.'\';</script>';
	    	echo '<script type="text/javascript">var mensagem = \''.$mensagem.'\';</script>';
?>
<script type="text/javascript">
	window.onload = function(){
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
</script>
<?php
    	}
    }
	$estados = select_many('id, nome, uf', 'estado');
	foreach ($estados as $key => $estado){
		$estados[$key]['cidades'] = select_many('id, nome', 'cidade', 'id_estado', $estado['id']);
	}
	echo '<script type="text/javascript">var num_estados = '.count($estados).';</script>';
?>
<div class='container col-md-5 col-lg-5 col-sm-5 col-xs-6 center'>
	<form method='post'>
		<div class='form-group'>
			<label for='nome'>Nome</label>
			<input class='form-control' type='text' name='nome' placeholder='Nome' value='<?php if(count($_POST) > 0){echo $_POST['nome'];} ?>' required />
		</div>
		<div class='form-group'>
			<label for='select_estado'>Estado</label>
			<div onclick='show_hide_cidade($("#select_estado").selectpicker("val"))'>
			<select id='select_estado' class='form-control selectpicker' data-style="btn-info" data-live-search='true' required>
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
		<button type='reset' class='btn btn-warning'>Apagar</button>
		<button type='submit' class='btn btn-primary'>Cadastrar</button>
	</form>
</div>