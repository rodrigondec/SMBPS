<?php 
    $respostas = select_many('*', 'resposta');
?>
<div class='text-center'>
	<h2>Respostas</h2>
	<hr />
</div>
<div class="table-responsive container">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
			<th>Hospital</th>
			<th class='col-lg-2 col-md-2 col-sm-2'>Id Formulário</th>
			<th>Pergunta</th>
			<th class='col-lg-2 col-md-2 col-sm-2'>Texto</th>
			<!-- <th class='col-lg-1 col-md-1 col-sm-1'></th> -->
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($respostas as $key => $resposta):
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $resposta['id']; ?>
			</td>
			<td>
				<?php 
					echo select('nome', 'hospital', 'id', select('id_hospital', 'hospital_setor', 'id', select('id_hospital_setor', 'formulário', 'id', $resposta['id_formulário'])['id_hospital_setor'])['id_hospital'])['nome'];
				?>
			</td>
			<td class='col-lg-2 col-md-2 col-sm-2'>
				<?php echo $resposta['id_formulário']; ?>
			</td>
			<td>
				<?php echo select('texto', 'pergunta', 'id', $resposta['id_pergunta'])['texto']; ?>
			</td>
			<td>
				<?php echo $resposta['texto']; ?>
			</td>
			<!-- <td class='col-lg-1 col-md-1 col-sm-1'>
				<a class='btn btn-info' data-toggle="modal" data-target="#myModal<?php echo $resposta['id']; ?>">
					Alterar
				</a>
				Modal
				<div id="myModal<?php echo $resposta['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					     Modal content
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Alterar Resposta</h4>
							</div>
							<div class="modal-body text-center">
								<form method='post'>
									<input type='number' name='id' value="<?php echo $resposta['id']; ?>" hidden required />
									<div class='form-group'>
                        				<label for='texto'>Texto</label>
										<textarea class='form-control' name='texto' required><?php echo $resposta['texto']; ?></textarea>
									</div>
									<input type='submit' value='Alterar' class='btn btn-primary' />
								</form>
							</div>
					    </div>
				  </div>
				</div>
			</td> -->
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
    			$dado = $value;
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