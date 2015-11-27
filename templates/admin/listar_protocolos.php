<?php 
    $protocolos = select_many('*', 'protocolo');
    $indicadores = select_many('*', 'indicador');
    $hospitais = select_many('*', 'hospital');
?>
<div class='text-center'>
	<h2>Protocolos</h2>
	<hr />
</div>
<div class="table-responsive container">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id hospital</th>
			<th>Hospital</th>
			<th class='col-lg-2 col-md-2 col-sm-2'>Id indicador</th>
			<th class='col-lg-2 col-md-2 col-sm-2'>Id imagem</th>
			<th class='col-lg-1 col-md-1 col-sm-1'>Ativo</th>
			<th>Data</th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($protocolos as $key => $value):
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $protocolos[$key]['id']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $protocolos[$key]['id_hospital']; ?>
			</td>
			<td>
				<?php 
					$hospital = select('nome', 'hospital', 'id', $protocolos[$key]['id_hospital'])['nome'];
					echo $hospital;
				?>
			</td>
			<td class='col-lg-2 col-md-2 col-sm-2'>
				<?php 
					echo $protocolos[$key]['id_indicador']; 
					$nome_indicador = select('nome', 'indicador', 'id', $protocolos[$key]['id_indicador'])['nome'];
					echo ' ('.$nome_indicador.')';
				?>
			</td>
			<td class='col-lg-2 col-md-2 col-sm-2'>
				<?php 
					echo $protocolos[$key]['id_imagem']; 
					$nome_imagem = select('nome', 'imagem', 'id', $protocolos[$key]['id_imagem'])['nome'];
				?>
				<a class='btn btn-info' data-toggle="modal"  data-target="#myModalimg<?php echo $protocolos[$key]['id_imagem']; ?>" style='margin-left:5%;'>
					Visualizar
				</a>
				<!-- Modal -->
				<div id="myModalimg<?php echo $protocolos[$key]['id_imagem']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-lg">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-left">Imagem</h4>
							</div>
							<div class="modal-body text-center">
								<img src="<?php echo PROTOCOLOS.$nome_imagem; ?>" width="100%">
							</div>
					    </div>
				  	</div>
				</div>
			</td>
			<td>
				<?php echo $protocolos[$key]['ativo']; ?>
			</td>
			<td>
				<?php echo $protocolos[$key]['data']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<a class='btn btn-primary' data-toggle="modal" data-target="#myModal<?php echo $protocolos[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $protocolos[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Alterar Protocolo</h4>
							</div>
							<div class="modal-body">
								<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
									<input type='number' name='id' value="<?php echo $protocolos[$key]['id']; ?>" hidden placeholder='' required />
									<div class='form-group'>
                        				<label for='id_indicador'>Indicador</label>
										<select class='form-control' name='id_indicador' required>
											<?php 
											    foreach($indicadores as $key2 => $value):
											?>
											<option value='<?php echo $indicadores[$key2]['id']; ?>' <?php if($protocolos[$key]['id_indicador'] == $indicadores[$key2]['id']){echo 'selected';} ?>>
												<?php echo $indicadores[$key2]['nome']?>
											</option>
											<?php
											    endforeach;
											?>
										</select>
									</div>
									<div class='form-group'>
                        				<label for='id_hospital'>Hospital</label>
										<select class='form-control' name='id_hospital' required>
											<?php 
											    foreach ($hospitais as $key2 => $value):
											?>
											<option value='<?php echo $hospitais[$key2]['id']; ?>' <?php if($protocolos[$key]['id_hospital'] == $hospitais[$key2]['id']){echo 'selected';} ?>>
												<?php echo $hospitais[$key2]['nome']?>
											</option>
											<?php
											    endforeach;
											?>
										</select>
									</div>
									<div class='form-group'>
                        				<label for='data'>Data</label>
										<input class='form-control' type='date' name='data' value="<?php echo $protocolos[$key]['data']; ?>"placeholder='Data' required />
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
    	foreach ($_POST as $key => $value){
    		if($key != 'id'){
    			$dados[$key] = $value;
    		}
    	}
    	var_dump($_POST);echo '<br /><br />';
    	var_dump($dados);
    	update($dados, 'protocolo', 'id', $_POST['id']);
    	ob_clean();
    	header('LOCATION: '.ADMIN.'listar_protocolos');
    }
?>