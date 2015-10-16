<?php 
    $hospitais = select_many('*', 'hospital', LINK);
?>
<div class='text-center'><h2>Hospitais</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Sigla</th>
			<th>Nome</th>
			<th>CNPJ</th>
			<th>Telefone</th>
			<th>Endereço</th>
			<th>CEP</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($hospitais as $key => $value):
	?>
		<tr>
			<td>
				<?php echo $hospitais[$key]['id']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['sigla']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['cnpj']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['telefone']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['endereco']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['cep']; ?>
			</td>
			<td class='text-right col-md-1'>
				<a class='btn btn-info' href="/smbps/index.php/admin/alterar_hospital?id='<?php echo $hospitais[$key]["id"]; ?>'">
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>