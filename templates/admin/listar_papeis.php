<?php 
    $papeis = select_many('*', 'papel');
?>
<div class='text-center'>
	<h2>Papéis</h2>
	<hr />
</div>
<div class="table-responsive container col-lg-4 col-md-4 col-sm-5 center">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
			<th>Papel</th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($papeis as $key => $value):
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $papeis[$key]['id']; ?>
			</td>
			<td>
				<?php echo $papeis[$key]['nome']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<a class='btn btn-primary' data-toggle="modal"  data-target="#myModal<?php echo $papeis[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $papeis[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Alterar Papel</h4>
							</div>
							<div class="modal-body">
								<form method='post'>
									<input type='number' name='id' value="<?php echo $papeis[$key]['id']; ?>" hidden required />
									<div class='form-group'>
                        				<label for='nome'>Nome</label>
										<input class='form-control' type='text' name='nome' value="<?php echo $papeis[$key]['nome']; ?>" placeholder='Nome' required />
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
    	update($dados, 'papel', 'id', $_POST['id']);
    	ob_clean();
    	header('LOCATION: '.ADMIN.'listar_papeis');
    }
?>