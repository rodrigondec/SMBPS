<div class='text-center'>
	<h2>Cadastrar Usuário</h2>
	<hr />
</div>
<?php 
    $papeis = select_many('*', 'papel');
    $hospitais = select_many('*', 'hospital');    
?>
<div class='container col-md-5 col-lg-5 col-sm-5 col-xs-6 center'>
	<form method='post'>
		<div class='form-group'>
			<label for='id_papel'>Papel</label>
			<div onclick='show_hide_hospital($("#select_papel").selectpicker("val"))'>
			<select id='select_papel' class='form-control selectpicker' name='id_papel' data-style="btn-info" required>
				<?php 
				    foreach ($papeis as $key2 => $value):
				?>
				<option value='<?php echo $papeis[$key2]['id']; ?>'>
					<?php echo $papeis[$key2]['nome']?>
				</option>
				<?php
				    endforeach;
				?>
			</select>
			</div>
		</div>
		<div id='div_select_hospital' class='form-group hidden'>
			<label for='id_hospital'>Hospital</label>
			<select id='select_hospital' class='form-control selectpicker' name='id_hospital' data-style="btn-info" data-live-search="true">
				<option value='' disabled selected>Selecionar hospital para gerir</option>
				<?php 
				    foreach ($hospitais as $key2 => $value):
				?>
				<option value='<?php echo $hospitais[$key2]['id']; ?>'>
					<?php echo $hospitais[$key2]['nome']?>
				</option>
				<?php
				    endforeach;
				?>
			</select>
		</div>
		<div class='form-group'>
			<label for='nome'>Nome</label>
			<input class='form-control' type='text' name='nome' placeholder='Nome' required />
		</div>
		<div class='form-group'>
			<label for='email'>Email</label>
			<input class='form-control' type='email' name='email' placeholder='Email' required />
		</div>
		<div class='form-group'>
			<label for='senha'>Senha</label>
			<input class='form-control' type='password' name='senha' placeholder='Senha' />
		</div>
		<input type='reset' value='Apagar' class='btn btn-warning' />
		<input type='submit' value='Cadastrar' class='btn btn-primary' />
	</form>
</div>
<?php 
    if(count($_POST) > 0){
    	var_dump($_POST);
    }
?>
<script type="text/javascript">
	function show_hide_hospital(valor){
		console.log(valor);
		if(valor == 1){
			$("#div_select_hospital").attr('class', 'form-group hidden')
			$("#select_hospital").attr('required', false)
		}
		else if(valor == 2){
			$("#div_select_hospital").attr('class', 'form-group')
			$("#select_hospital").attr('required', true)
		}
	}
</script>