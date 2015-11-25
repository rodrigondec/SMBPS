<?php 
    $hospitais = select_many('*', 'hospital');
?>
<div class='text-center'>
	<h2>Hospitais</h2>
	<hr />
</div>
<div class="table-responsive container">
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-1'>Id Cidade</th>
			<th>Nome</th>
			<th>CNPJ</th>
			<th>Telefone</th>
			<th>Endereço</th>
			<th>CEP</th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($hospitais as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $hospitais[$key]['id']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $hospitais[$key]['id_cidade']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['nome']; ?>
			</td>
			<td data-mask='00.000.000/0000-00'>
				<?php echo $hospitais[$key]['cnpj']; ?>
			</td>
			<td data-mask='(00) 0000-0000'>
				<?php echo $hospitais[$key]['telefone']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['endereço']; ?>
			</td>
			<td data-mask='00.000-000'>
				<?php echo $hospitais[$key]['cep']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-primary' data-toggle="modal"  data-target="#myModal<?php echo $hospitais[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $hospitais[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-left">Alterar Hopistal</h4>
							</div>
							<div class="modal-body text-center">
								<form method='post'>
									<input type='number' name='id' value="<?php echo $hospitais[$key]['id']; ?>" hidden placeholder='' required />
									<input class='form-control' type='number' name='id_cidade' value="<?php echo $hospitais[$key]['id_cidade']; ?>" placeholder='Id cidade' required />
									<input class='form-control' type='text' name='nome' value="<?php echo $hospitais[$key]['nome']; ?>" placeholder='Nome' required />
									<input class='form-control' type='text' name='cnpj' value="<?php echo $hospitais[$key]['cnpj']; ?>" data-mask='00.000.000/0000-00' placeholder='CNPJ' required />
									<input class='form-control' type='text' name='telefone' value="<?php echo $hospitais[$key]['telefone']; ?>" data-mask='(00) 0000-0000' placeholder='Telefone' required />
									<input class='form-control' type='text' name='endereço' value="<?php echo $hospitais[$key]['endereço']; ?>" placeholder='Endereço' required />
									<input class='form-control' type='text' name='cep' value="<?php echo $hospitais[$key]['cep']; ?>" data-mask='00.000-000' placeholder='CEP' required />
								<div class='text-right'>
									<button class='btn btn-primary'>Alterar</button>
								</div>
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
    	foreach ($_POST as $key => $value){
    		if($key != 'id'){
    			$dados[$key] = retirar_mascara($key, $value);
    		}
    	}
    	var_dump($dados);
    	update($dados, 'hospital', 'id', $_POST['id']);
    	ob_clean();
    	header('LOCATION: '.ADMIN.'listar_hospitais');
    }
?>