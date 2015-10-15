<?php 
    $formularios = select_many('*', 'formulario', LINK, 'where id_hosp = \''.$_SESSION['hospital'].'\'');
?>
<div class='text-center'><h2>formularios</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Data de Recebimento</th>
			<th>Mês da Avaliação</th>
			<th>Nome Responsável</th>
			<th>Email Responsável</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($formularios as $key => $value):
	?>
		<tr>
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
			<td>
				<a class='btn btn-success' href="/sbmps/index.php/hospital/ver_formulario?id='<?php echo $formularios[$key]["id"]; ?>'">
					Visualizar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>