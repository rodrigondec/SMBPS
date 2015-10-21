<?php 
    $protocolos = select_many('*', 'protocolo', LINK);
?>
<div class='text-center'><h2>protocolos</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-1'>Id indicador</th>
			<th class='col-md-1'>Id imagem</th>
			<th class='col-md-1'>Id hospital</th>
			<th>Nome Hospital</th>
			<th>Data</th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($protocolos as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $protocolos[$key]['id']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $protocolos[$key]['id_indicador']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $protocolos[$key]['id_imagem']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $protocolos[$key]['id_hospital']; ?>
			</td>
			<td>
				<?php echo 'Nome Hospital XX' ?>
			</td>
			<td>
				<?php echo $protocolos[$key]['data']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' href="/smbps/index.php/admin/alterar_protocolo?id='<?php echo $protocolos[$key]["id"]; ?>'">
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>