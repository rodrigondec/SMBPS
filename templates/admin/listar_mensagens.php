<?php 
    $mensagens = select_many('*', 'mensagem');
?>
<div class='text-center'>
	<h2>Mensagens</h2>
	<hr />
</div>
<div class="table-responsive container col-lg-7 center">
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Data</th>
			<th>Texto</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($mensagens as $key => $value):
	?>
		<tr>
			<td class='col-lg-1 col-md-1 col-sm-1'>
				<?php echo $mensagens[$key]['id']; ?>
			</td>
			<td>
				<?php echo $mensagens[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $mensagens[$key]['email']; ?>
			</td>
			<td>
				<?php echo $mensagens[$key]['data']; ?>
			</td>
			<td>
				<?php echo $mensagens[$key]['texto']; ?>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>
</div>