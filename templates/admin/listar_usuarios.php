<?php 
    $usuarios = select_many('*', 'usuario', LINK);
?>
<div class='text-center'><h2>Usuários</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Id Papel</th>
			<th>Id Hospital</th>
			<th>Nome</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($usuarios as $key => $value):
	?>
		<tr>
			<td>
				<?php echo $usuarios[$key]['id']; ?>
			</td>
			<td>
				<?php echo $usuarios[$key]['id_papel']; ?>
			</td>
			<td>
				<?php echo $usuarios[$key]['id_hospital']; ?>
			</td>
			<td>
				<?php echo $usuarios[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $usuarios[$key]['email']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' href="/smbps/index.php/admin/alterar_usuario?id='<?php echo $usuarios[$key]["id"]; ?>'">
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>