<?php 
    $usuarios = select_many('*', 'usuário');
    $papeis = select_many('*', 'papel');
    $hospitais = select_many('*', 'hospital');    
?>
<div class='text-center'>
	<h2>Usuários</h2>
	<hr />
</div>
<div class="table-responsive container">
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-1'>Id Papel</th>
			<th class='col-md-1'>Id Hospital</th>
			<th>Nome</th>
			<th>Email</th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($usuarios as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $usuarios[$key]['id']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $usuarios[$key]['id_papel']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $usuarios[$key]['id_hospital']; ?>
			</td>
			<td>
				<?php echo $usuarios[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $usuarios[$key]['email']; ?>
			</td>
			<td class='col-md-1'>
				<a class='btn btn-primary' data-toggle="modal"  data-target="#myModal<?php echo $usuarios[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $usuarios[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Alterar Usuário</h4>
							</div>
							<div class="modal-body">
								<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
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
							</div>
					    </div>
				  </div>
				</div>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>
</div>
<?php 
    if(count($_POST) > 0){
    	echo 'POST ANTES TRATAMENTO:';var_dump($_POST);echo '<br /><br />';
    	if($_POST['senha'] == ''){
    		unset($_POST['senha']);
    	}
    	else{
    		$_POST['senha'] = md5($_POST['senha']);
    	}
    	foreach ($_POST as $key => $value){
    		if($key != 'id'){
    			$dados[$key] = $value;
    		}
    	}
    	var_dump($_POST);echo '<br /><br />';
    	var_dump($dados);
    	update($dados, 'usuário', 'id', $_POST['id']);
    	ob_clean();
    	header('LOCATION: '.ADMIN.'listar_usuarios');
    }
?>
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