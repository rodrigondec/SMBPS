<?php 
    $usuarios = select_many('*', 'usuário');
    $papeis = select_many('*', 'papel');
    $hospitais = select_many('*', 'hospital');    
?>
<div class='text-center'>
	<h2>Usuários</h2>
	<hr />
</div>
<div class="table-responsive container col-lg-6 col-md-6 col-sm-6 center">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id Papel</th>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id Hospital</th>
			<th>Nome</th>
			<th>Email</th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($usuarios as $key => $value):
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $usuarios[$key]['id']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php 
					echo $usuarios[$key]['id_papel']; 
				?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php 
					echo $usuarios[$key]['id_hospital']; 
				?>
			</td>
			<td>
				<?php echo $usuarios[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $usuarios[$key]['email']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
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
								<form method='post'>
									<input type='number' name='id' value="<?php echo $usuarios[$key]['id']; ?>" hidden placeholder='' required />
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
										<input class='form-control' type='password' name='senha' placeholder='Senha' />
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