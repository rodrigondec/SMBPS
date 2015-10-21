<?php 
    $papeis = select_many('*', 'papel', LINK);
?>
<div class='text-center'><h2>Papéis</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th>Papel</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($papeis as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $papeis[$key]['id']; ?>
			</td>
			<td>
				<?php echo $papeis[$key]['nome']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $papeis[$key]['id']; ?>">
					Alterar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $papeis[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-sm">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-left">Alterar Papel</h4>
							</div>
							<div class="modal-body text-center">
								<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
									<input type='number' name='id' value="<?php echo $papeis[$key]['id']; ?>" hidden />
									<input class='form-control' type='text' name='nome' value="<?php echo $papeis[$key]['nome']; ?>" />
								<div class='text-right'>
									<button class='btn btn-default '>Alterar</button>
								</div>
									
								</form>
							</div>
<!-- 							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div> -->
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
<?php 
    if(count($_POST) > 0){
    	$dados['nome'] = $_POST['nome'];
    	update($dados, 'papel', 'id', $_POST['id'], LINK);
    	ob_clean();
    	header('LOCATION: /smbps/index.php/admin/listar_papeis');
    }
?>