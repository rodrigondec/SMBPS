<?php 
    $perguntas = select_many('*', 'pergunta');
    $indicadores = select_many('*', 'indicador');
?>
<div class='text-center'>
	<h2>Perguntas</h2>
	<hr />
</div>
<div class="table-responsive container">
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-2'>Indicador</th>
			<th>Texto</th>
			<th>Obrigatória</th>
			<th>Observação</th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($perguntas as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $perguntas[$key]['id']; ?>
			</td>
			<td class='col-md-2'>
				<?php 
					echo $perguntas[$key]['id_indicador']; 
					$nome_indicador = select('nome', 'indicador', 'id', $perguntas[$key]['id_indicador'])['nome'];
					echo ' ('.$nome_indicador.')';
				?>
			</td>
			<td>
				<?php echo $perguntas[$key]['texto']; ?>
			</td>
			<td class='col-md-1'>
				<?php
					if($perguntas[$key]['obrigatória'] == '1'){
						echo 'Sim';
					}
					else{
						echo 'Não';
					}
				?>
			</td>
			<td>
				<?php echo $perguntas[$key]['observação']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-primary' data-toggle="modal"  data-target="#myModal<?php echo $perguntas[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $perguntas[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-left">Alterar Pergunta</h4>
							</div>
							<div class="modal-body text-center">
								<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
									<input type='number' name='id' value="<?php echo $perguntas[$key]['id']; ?>" hidden required />
									<div class='form-group text-left'>
                        				<label for='id_indicador'>Indicador</label>
										<select class='form-control' name='id_indicador' required>
											<?php 
											    foreach ($indicadores as $key2 => $value):
											?>
											<option value='<?php echo $indicadores[$key2]['id']; ?>' <?php if($perguntas[$key]['id_indicador'] == $indicadores[$key2]['id']){echo 'selected';} ?>>
												<?php echo $indicadores[$key2]['nome']?>
											</option>

											<?php
											    endforeach;
											?>
										</select>
									</div>
									
									<div class='form-group text-left'>
                        				<label for='texto'>Texto</label>
										<textarea class='form-control' name='texto' required><?php echo $perguntas[$key]['texto']; ?></textarea>
									</div>
									
									<div class='form-group text-left'>
                        				<label for='obrigatória'>Obrigatória?</label>
										<select class='form-control' name='obrigatória' required>
											<option value='1' <?php if($perguntas[$key]['obrigatória'] == '1'){echo 'selected';} ?> >
												Sim
											</option>
											<option value='0' <?php if($perguntas[$key]['obrigatória'] == '0'){echo 'selected';} ?> >
												Não
											</option>
										</select>
									</div>
									
									<div class='form-group text-left'>
                        				<label for='observação'>Observação</label>
										<textarea class='form-control' name='observação'><?php echo $perguntas[$key]['observação']; ?></textarea>
									</div>
									
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
    	var_dump($_POST);
    	foreach ($_POST as $key => $value){
    		if($key != 'id'){
    			$dados[$key] = $value;
    		}
    	}
    	update($dados, 'pergunta', 'id', $_POST['id']);
    	ob_clean();
    	header('LOCATION: '.ADMIN.'listar_perguntas');
    }
?>