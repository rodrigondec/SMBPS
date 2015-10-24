<?php 
    $imagens = select_many('*', 'imagem');
?>
<div class='text-center'><h2>Imagens</h2></div>
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
	    foreach ($imagens as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $imagens[$key]['id']; ?>
			</td>
			<td>
				<?php echo $imagens[$key]['nome']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $imagens[$key]['id']; ?>">
					visualizar
				</a>
				<!-- Modal -->
				<div id="myModal<?php echo $imagens[$key]['id']; ?>" class="modal fade" role="dialog">
			  		<div class="modal-dialog modal-lg">
					    <!-- Modal content-->
					    <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-left">Imagem</h4>
							</div>
							<div class="modal-body text-center">
								<img src="<?php echo IMGS.$imagens[$key]['nome']; ?>" width="100%">
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
</div>