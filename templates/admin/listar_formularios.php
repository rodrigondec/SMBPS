<?php 
    $formularios = select_many('*', 'formulário');
?>
<div class='text-center'>
	<h2>Formulários</h2>
	<hr />
</div>
<div class="table-responsive container">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id hospital</th>
			<th>Nome Hospital</th>
			<th>Data de Recebimento</th>
			<th>Mês da Avaliação</th>
			<th>Nome Responsável</th>
			<th>Email Responsável</th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($formularios as $key => $value):
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $formularios[$key]['id']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
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
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<a class='btn btn-info' href="<?php echo ADMIN; ?>ver_formulario?id='<?php echo $formularios[$key]["id"]; ?>'">
					Visualizar
				</a>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<a class='btn btn-primary' href="<?php echo ADMIN; ?>alterar_formulario?id='<?php echo $formularios[$key]["id"]; ?>'">
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>
</div>