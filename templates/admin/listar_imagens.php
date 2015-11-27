<?php 
    $imagens = select_many('*', 'imagem');
?>
<div class='text-center'>
	<h2>Imagens</h2>
	<hr />
</div>
<div class="table-responsive container col-lg-4 col-md-4 col-sm-5 center">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
			<th>Nome</th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($imagens as $key => $value):
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $imagens[$key]['id']; ?>
			</td>
			<td>
				<?php echo $imagens[$key]['nome']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
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
								<img src="<?php echo PROTOCOLOS.$imagens[$key]['nome']; ?>" width="100%">
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