<?php 
    $indicadores = select_many('*', 'indicador');
?>
<div class='text-center'>
	<h2>Indicadores</h2>
	<hr />
</div>
<div class="table-responsive">
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th>Nome</th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($indicadores as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $indicadores[$key]['id']; ?>
			</td>
			<td>
				<?php echo $indicadores[$key]['nome']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-primary' data-toggle="modal"  data-target="#myModal<?php echo $indicadores[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $indicadores[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-left">Alterar Indicador</h4>
							</div>
							<div class="modal-body text-center">
								<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
									<input type='number' name='id' value="<?php echo $indicadores[$key]['id']; ?>" hidden required />
									<input class='form-control' type='text' name='nome' value="<?php echo $indicadores[$key]['nome']; ?>" placeholder='Nome' required />
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
    	update($dados, 'indicador', 'id', $_POST['id']);
    	ob_clean();
    	header('LOCATION: '.ADMIN.'listar_indicadores');
    }
?>