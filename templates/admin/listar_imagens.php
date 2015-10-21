<?php 
    $imagens = select_many('*', 'imagem', LINK);
?>
<div class='text-center'><h2>Imagens</h2></div>
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
				<a class='btn btn-info' href="/smbps/index.php/admin/visualizar_imagem?id='<?php echo $imagens[$key]["id"]; ?>'">
					Visualizar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>