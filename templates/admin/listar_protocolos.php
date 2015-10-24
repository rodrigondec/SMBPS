<?php 
    $protocolos = select_many('*', 'protocolo');
    $indicadores = select_many('*', 'indicador');
    $hospitais = select_many('*', 'hospital');
?>
<div class='text-center'><h2>Protocolos</h2></div>
<div class="table-responsive">
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-1'>Id hospital</th>
			<th>Nome Hospital</th>
			<th class='col-md-2'>Id indicador</th>
			<th class='col-md-2'>Id imagem</th>
			<th>Data</th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($protocolos as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $protocolos[$key]['id']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $protocolos[$key]['id_hospital']; ?>
			</td>
			<td>
				<?php 
					$hospital = select('nome', 'hospital', 'id', $protocolos[$key]['id_hospital'])['nome'];
					echo $hospital;
				?>
			</td>
			<td class='col-md-2'>
				<?php 
					echo $protocolos[$key]['id_indicador']; 
					$nome_indicador = select('nome', 'indicador', 'id', $protocolos[$key]['id_indicador'])['nome'];
					echo ' ('.$nome_indicador.')';
				?>
			</td>
			<td class='col-md-2'>
				<?php 
					echo $protocolos[$key]['id_imagem']; 
					$nome_imagem = select('nome', 'imagem', 'id', $protocolos[$key]['id_imagem'])['nome'];
				?>&nbsp;&nbsp;&nbsp;&nbsp;
				<a class='btn btn-info' data-toggle="modal"  data-target="#myModalimg<?php echo $protocolos[$key]['id_imagem']; ?>">
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
								<img src="<?php echo IMGS.$nome_imagem; ?>" width="100%">
							</div>
					    </div>
				  </div>
				</div>
			</td>
			<td>
				<?php echo $protocolos[$key]['data']; ?>
			</td>
			<td class='text-right col-md-1'>
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
								<h4 class="modal-title text-left">Alterar Protocolo</h4>
							</div>
							<div class="modal-body text-center">
								<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
									<input type='number' name='id' value="<?php echo $protocolos[$key]['id']; ?>" hidden placeholder='' required />
									<select class='form-control' name='id_indicador' required>
										<option>Indicador</option>
										<?php 
										    foreach ($indicadores as $key2 => $value):
										?>
										<option value='<?php echo $indicadores[$key2]['id']; ?>' <?php if($protocolos[$key]['id_indicador'] == $indicadores[$key2]['id']){echo 'selected';} ?>>
											<?php echo $indicadores[$key2]['nome']?>
										</option>

										<?php
										    endforeach;
										?>
									</select>
									<select class='form-control' name='id_hospital' required>
										<option>Hospital</option>
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
									<input class='form-control' type='date' name='data' value="<?php echo $protocolos[$key]['data']; ?>"placeholder='Data' required />
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