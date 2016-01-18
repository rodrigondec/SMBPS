<div class='text-center'>
	<h2>Cadastrar Formulário</h2>
	<hr />
</div>
<?php 
    $perguntas = select_many('*', 'pergunta');
    $id_hospital_setor = select('id', 'hospital_setor', '(id_hospital, id_setor)', '('.$_SESSION['id_hospital'].', '.$_GET['id_setor'].')', false)['id'];
    $formulario = select('*', 'formulário', '(id_hospital_setor, id_mês, ano)', '('.$id_hospital_setor.', '.$_GET['id_mês'].', \''.'2016'.'\')', false);
    if($formulario){
    	if($formulario['concluído'] == 1){
    		swal('Formulário indisponível!', 'Esse formulário já foi concluído!', 'error', HOSPITAL.'selecionar_formulario?action=cadastrar');
    	}
    }
    // var_dump($formulario);
?>
<div class='container'>
	<form method='post' class='col-lg-6 center'>
	<?php 
		foreach ($perguntas as $key => $pergunta): 
			$resposta = array();
			if($formulario){
				$resposta = select('*', 'resposta', '(id_pergunta, id_formulário)', '('.$pergunta['id'].', '.$formulario['id'].')', false);
				// var_dump($resposta);
			}
	?>
		<div class='form-group'>
			<label><?php echo $pergunta['id'].'. '.$pergunta['texto']; ?></label>
		<?php 
		    $pergunta_inputs = select_many('*', 'pergunta_input', 'id_pergunta', $pergunta['id']);
		    foreach($pergunta_inputs as $key => $pergunta_input):
		    	$input = select('*', 'input', 'id', $pergunta_input['id_input']);
		    	if($input['type'] == 'radio'):
		?>
			<div class="radio">
			  	<label>
			  		<input type="<?php echo $input['type']; ?>" name="<?php echo $pergunta_input['name']; ?>" value='<?php echo $input['value']; ?>' <?php if($resposta){ if($resposta['texto'] == $input['value']){ echo 'checked '; } echo 'disabled'; } ?> />
			  		<?php echo $input['value']; ?>
		  		</label>
			</div>
			<?php else: ?>
			<input name='<?php echo $pergunta_input['name']; ?>' type='<?php echo $input['type']; ?>' class='form-control' <?php if($resposta){ echo 'disabled'; } ?> value='<?php if($resposta){ echo $resposta['texto']; } ?>' <?php if($input['type'] == 'number'){ echo "min='0'";} ?> />
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
		<button type='reset' class='btn btn-danger'>Apagar</button>
		<button type='submit' class='btn btn-primary'>Cadastrar</button>
	</form>
</div>
<?php 
	foreach ($_POST as $key => $value) {
		if($value == ''){
			unset($_POST[$key]);
		}
	}
    if(count($_POST) > 0){
    	if(!$formulario){
    		$dados = array();
    		$dados['nome_responsável'] = select('nome', 'usuário', 'email', $_SESSION['email'])['nome'];
    		$dados['email_responsável'] = $_SESSION['email'];
    		$dados['id_hospital_setor'] = $id_hospital_setor;
    		$dados['ano'] = date("Y");
    		$dados['id_mês'] = $_GET['id_mês'];
    		insert($dados, 'formulário');
    	}
    	$id_formulario = select('max(id)', 'formulário')['max(id)'];

    	foreach ($_POST as $nome_pergunta_input => $resposta) {
    		$dados = array();
    		$dados['id_pergunta'] = select('id_pergunta', 'pergunta_input', 'name', $nome_pergunta_input)['id_pergunta'];
    		$dados['id_formulário'] = $id_formulario;
    		$dados['texto'] = $resposta;
    		insert($dados, 'resposta');
    	}

    	$respostas = select_many('*', 'resposta', 'id_formulário', $id_formulario);
    	$resposta_17 = select('*', 'resposta', '(id_formulário, id_pergunta)', '('.$id_formulario.', 17)', false);
    	$resposta_18 = select('*', 'resposta', '(id_formulário, id_pergunta)', '('.$id_formulario.', 18)', false);
    	$resposta_19 = select('*', 'resposta', '(id_formulário, id_pergunta)', '('.$id_formulario.', 19)', false);
    	if(count($respostas) == count($perguntas) || (count($respostas) == 17 && $resposta_17['texto'] == 'Não' && !$resposta_18 && !$resposta_19)){
    		$dados = array();
    		$dados['concluído'] = '1';
    		update($dados, 'formulário', 'id', $id_formulario);
    	}

    	ob_clean();
    	header('location: '.HOSPITAL.'selecionar_formulario?action=cadastrar');
    }
?>