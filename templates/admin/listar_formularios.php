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
			<th>Nome Hospital</th>
			<th>Setor</th>
			<!-- <th>Data de Recebimento</th> -->
			<th>Mês da Avaliação</th>
			<th>Nome Responsável</th>
			<th>Email Responsável</th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
			<th class='col-lg-1 col-md-1 col-sm-1'></th>
		</tr>
	</thead>
	<tbody>
	<?php 
		// var_dump($formularios);
	    foreach ($formularios as $key => $formulario):
	    	$id_hospital = select('id_hospital', 'hospital_setor', 'id', $formulario['id_hospital_setor'])['id_hospital'];
	   		$id_setor = select('id_setor', 'hospital_setor', 'id', $formulario['id_hospital_setor'])['id_setor'];
	    	$hospital = select('*', 'hospital', 'id', $id_hospital);
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $formulario['id']; ?>
			</td>
			<td>
				<?php echo $hospital['nome']; ?>
			</td>
			<td>
				<?php echo select('nome', 'setor', 'id', $id_setor)['nome']; ?>
			</td>
			<!-- <td>
				<?php echo $formularios[$key]['data_recebimento']; ?>
			</td> -->
			<td>
				<?php echo select('nome', 'mês', 'id', $formulario['id_mês'])['nome']; ?>
			</td>
			<td>
				<?php echo $formulario['nome_responsável']; ?>
			</td>
			<td>
				<?php echo $formulario['email_responsável']; ?>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<a class='btn btn-info' href='<?php echo ADMIN."vizualizar_formulario?id=".$formulario["id"].""; ?>'>
					Visualizar
				</a>
			</td>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<a class='btn btn-primary' href="#">
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