<?php 
    $hospitais = select_many('*', 'hospital', LINK);
?>
<div class='text-center'><h2>Hospitais</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th class='col-md-1'>Id</th>
			<th class='col-md-1'>Id Cidade</th>
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
			<td class='col-md-1'>
				<?php echo $hospitais[$key]['id']; ?>
			</td>
			<td class='col-md-1'>
				<?php echo $hospitais[$key]['id_cidade']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['sigla']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['nome']; ?>
			</td>
			<td data-mask='00.000.000/0000-00'>
				<?php echo $hospitais[$key]['cnpj']; ?>
			</td>
			<td data-mask='(00) 0000-0000'>
				<?php echo $hospitais[$key]['telefone']; ?>
			</td>
			<td>
				<?php echo $hospitais[$key]['endereco']; ?>
			</td>
			<td data-mask='00.000-000'>
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