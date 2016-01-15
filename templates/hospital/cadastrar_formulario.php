<div class='text-center'>
	<h2>Cadastrar Formulário</h2>
	<hr />
</div>
<?php 
    $perguntas = select_many('*', 'pergunta');
    $formulario = select('*', 'formulário');
?>
<div container>
	<form method='post' class='col-lg-6 center'>
	<?php foreach ($perguntas as $key => $pergunta): ?>
		<div class='form-group'>
			<label for=''><?php echo $pergunta['texto']; ?></label>
		<?php 
		    $pergunta_inputs = select_many('*', 'pergunta_input', 'id_pergunta', $pergunta['id']);
		    foreach ($pergunta_inputs as $key => $pergunta_input):
		    	$input = select('*', 'input', 'id', $pergunta_input['id_input']);
		    	if($input['type'] == 'radio'):
		?>
			<div class="radio">
			  	<label>
			  		<input type="<?php echo $input['type']; ?>" name="<?php echo $pergunta_input['name']; ?>">
			  		<?php echo $input['value']; ?>
		  		</label>
			</div>
			<?php else: ?>
			<input name='<?php echo $pergunta_input['name']; ?>' type='<?php echo $input['type']; ?>' class='form-control' />
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
		<button type='reset' class='btn btn-danger'>Apagar</button>
		<button type='submit' class='btn btn-primary'>Enviar</button>
	</form>
</div>
<?php 
	foreach ($_POST as $key => $value) {
		if($value == ''){
			unset($_POST[$key]);
		}
	}
    if(count($_POST) > 0){
    	var_dump($_POST);
    }
?>