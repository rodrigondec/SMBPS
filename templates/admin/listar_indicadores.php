<?php 
    $indicadores = select_many('*', 'indicador', LINK);
?>
<div class='text-center'><h2>indicadores</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th>Nome</th>
			<th></th>
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
				<a class='btn btn-info' href="/smbps/index.php/admin/alterar_indicador?id='<?php echo $indicadores[$key]["id"]; ?>'">
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>