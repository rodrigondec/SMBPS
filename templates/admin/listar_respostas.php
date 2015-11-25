<?php 
    $respostas = select_many('*', 'resposta');
?>
<div class='text-center'>
	<h2>Respostas</h2>
	<hr />
</div>
<div class="table-responsive container">
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-1'>Id Hospital</th>
			<th>Hospital</th>
			<th class='col-md-2'>Id Pergunta</th>
			<th class='col-md-2'>Id Formulário</th>
			<th>Texto</th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($respostas as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $respostas[$key]['id']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $respostas[$key]['id_hospital']; ?>
			</td>
			<td>
				<?php 
					$hospital = select('nome', 'hospital', 'id', $protocolos[$key]['id_hospital'])['nome'];
					echo $hospital;
				?>
			</td>
			<td class='col-md-2'>
				<?php echo $respostas[$key]['id_pergunta']; ?>
			</td>
			<td class='col-md-2'>
				<?php echo $respostas[$key]['id_formulario']; ?>
			</td>
			<td>
				<?php echo $respostas[$key]['texto']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $respostas[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $respostas[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-left">Alterar Resposta</h4>
							</div>
							<div class="modal-body text-center">
								<form method='post'>
									<input type='number' name='id' value="<?php echo $respostas[$key]['id']; ?>" hidden required />
									<div class='form-group text-left'>
                        				<label for='texto'>Texto</label>
										<textarea class='form-control' name='texto' required><?php echo $respostas[$key]['texto']; ?></textarea>
									</div>
								<div class='text-right'>
									<button class='btn btn-default '>Alterar</button>
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
    	//update($dados, 'resposta', 'id', $_POST['id']);
    	//ob_clean();
    	//header('LOCATION: '.ADMIN.'listar_respostas');
    }
?>
<!-- <form method='post'>
<textarea class='form-control' name='texto' required>
teste
</textarea>
<input type='submit' class='btn btn-info' />
</form> -->