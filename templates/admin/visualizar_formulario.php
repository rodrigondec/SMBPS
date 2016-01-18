<div class='text-center'>
	<h2>Visualizar Formulário</h2>
	<hr />
</div>
<?php 
    $perguntas = select_many('*', 'pergunta');
    $formulario = select('*', 'formulário', 'id', $_GET['id']);
    if(!$formulario){
		swal('Formulário indisponível!', 'Esse formulário não foi cadastrado!', 'error', HOSPITAL.'selecionar_formulario?action=visualizar');
    }
    // var_dump($formulario);
?>
<div class='container col-lg-6 center'>
<?php 
	foreach ($perguntas as $key => $pergunta): 
		$resposta = array();
		if($formulario){
			$resposta = select('*', 'resposta', '(id_pergunta, id_formulário)', '('.$pergunta['id'].', '.$formulario['id'].')', false);
			// var_dump($resposta);
		}
		if($resposta):
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
	<?php endif; ?>
<?php endforeach; ?>
</div>