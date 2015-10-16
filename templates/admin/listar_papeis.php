<?php 
    $papeis = select_many('*', 'papel', LINK);
?>
<div class='text-center'><h2>Papéis</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Papel</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($papeis as $key => $value):
	?>
		<tr>
			<td>
				<?php echo $papeis[$key]['id']; ?>
			</td>
			<td>
				<?php echo $papeis[$key]['nome']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' href="/smbps/index.php/admin/alterar_papei?id='<?php echo $papeis[$key]["id"]; ?>'">
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>