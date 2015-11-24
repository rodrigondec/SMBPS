<form method='post'>
	<input type='number' name='id' value="<?php echo $usuarios[$key]['id']; ?>" hidden placeholder='' required />
	<div class='form-group'>
		<label for='id_papel'>Papel</label>
		<select class='form-control' name='id_papel' <?php echo "onblur='select_hospital(".$usuarios[$key]['id'].", $(this).val())'";  ?> required>
			<?php 
			    foreach ($papeis as $key2 => $value):
			?>
			<option value='<?php echo $papeis[$key2]['id']; ?>' <?php if($usuarios[$key]['id_papel'] == $papeis[$key2]['id']){echo 'selected';} ?>>
				<?php echo $papeis[$key2]['nome']?>
			</option>
			<?php
			    endforeach;
			?>
		</select>
	</div>
	<div id='div_select_hospital<?php echo $usuarios[$key]['id']; ?>' class='form-group <?php if($usuarios[$key]['id_papel'] == 1){ echo 'hidden'; } ?>'>
		<label for='id_hospital'>Hospital</label>
		<select id='select_hospital<?php echo $usuarios[$key]['id']; ?>' class='form-control' name='id_hospital' id='select_hospital<?php echo $usuarios[$key]['id']; ?>' required>
			<option value='' disabled selected>Selecionar hospital para gerir</option>
			<?php 
			    foreach ($hospitais as $key2 => $value):
			?>
			<option value='<?php echo $hospitais[$key2]['id']; ?>' <?php if($usuarios[$key]['id_hospital'] == $hospitais[$key2]['id']){echo 'selected';} ?>>
				<?php echo $hospitais[$key2]['nome']?>
			</option>
			<?php
			    endforeach;
			?>
		</select>
	</div>

	<div class='form-group'>
		<label for='nome'>Nome</label>
		<input class='form-control' type='text' name='nome' value="<?php echo $usuarios[$key]['nome']; ?>" placeholder='Nome' required />
	</div>
	
	<div class='form-group'>
		<label for='email'>Email</label>
		<input class='form-control' type='email' name='email' value="<?php echo $usuarios[$key]['email']; ?>"placeholder='Email' required />
	</div>
	
	<div class='form-group'>
		<label for='senha'>Senha</label>
		<input class='form-control' type='password' name='senha' placeholder='senha' />
	</div>
	
	<input type='submit' value='Alterar' class='btn btn-primary' />
</form>

<script type="text/javascript">
	function select_hospital(id, valor){
		console.log(valor);
		if(valor == 1){
			$("#div_select_hospital"+id).attr('class', 'form-group hidden')
			$("#select_hospital"+id).attr('required', false)
		}
		else if(valor == 2){
			$("#div_select_hospital"+id).attr('class', 'form-group')
			$("#select_hospital"+id).attr('required', true)
		}
	}
</script>