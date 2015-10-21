<?php 
    $formularios = select_many('*', 'formulario', LINK);
?>
<div class='text-center'><h2>formularios</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-1'>Id hospital</th>
			<th>Nome Hospital</th>
			<th>Data de Recebimento</th>
			<th>Mês da Avaliação</th>
			<th>Nome Responsável</th>
			<th>Email Responsável</th>
			<th class='col-md-1'></th>
			<th class='col-md-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($formularios as $key => $value):
	?>
		<tr>
			<td class='col-md-1'>
				<?php echo $formularios[$key]['id']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $formularios[$key]['id_hospital']; ?>
			</td>
			<td>NOME HOSPITAL X</td>
			<td>
				<?php echo $formularios[$key]['data_recebimento']; ?>
			</td>
			<td>
				<?php echo $formularios[$key]['mes_avaliacao']; ?>
			</td>
			<td>
				<?php echo $formularios[$key]['nome_responsavel']; ?>
			</td>
			<td>
				<?php echo $formularios[$key]['email_responsavel']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-success' href="/sbmps/index.php/admin/ver_formulario?id='<?php echo $formularios[$key]["id"]; ?>'">
					Visualizar
				</a>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' href="/smbps/index.php/admin/alterar_formulario?id='<?php echo $formularios[$key]["id"]; ?>'">
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>