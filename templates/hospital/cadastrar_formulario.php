<style type="text/css">
	h5{
		color: gray;
		margin-bottom: 0.3%;
		margin-top: 0.4%;
	}
	p{
		font-weight: bold;
		margin-bottom: 0;
	}
	p.obrigatorio{
		margin-bottom: 1%;
		font-weight: normal;
	}
	span.obrigatorio{
		color: red;
	}
	div.input{
		margin-bottom: 2%;
	}
</style>
<div class='text-center'>
	<h2>MONITORAMENTO DOS INDICADORES DE BOAS PRÁTICAS</h2>
	<hr />
</div>
<?php 
	$indicadores = select_many('id, nome', 'indicador');
	echo "<script type='text/javascript'>var num_indicadores = ".count($indicadores).";</script>";
	// var_dump($indicadores);echo '<br /><br />';

	$setores_hospital = select_many('id, id_setor', 'setor_hospital', 'id_hospital', $_SESSION['id_hospital']);
	// var_dump($setores_hospital);echo '<br /><br />';

	$meses = select_many('id, nome', 'mês');
	// var_dump($meses);echo '<br /><br />';
    // $perguntas = select_many('*', 'pergunta', 'id_indicador', $_GET['id']);
    // var_dump($perguntas);
?>
<div class='container col-lg-4 col-md-4 col-sm-5 center'>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Selecionar Indicadores</h3>
		</div>
		<div class="panel-body">
			<div class='col-lg-11'>
			<?php
				foreach ($indicadores as $num => $indicador):
			?>
				<label class="checkbox">
					<input type="checkbox" <?php echo "onclick='show_hide_perguntas_indicador(".$indicador['id'].", $(this).is(\":checked\"))'"; ?> checked>
					<?php echo $indicador['nome']; ?>
				</label>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<div class='container col-lg-5 center'>
	<form method='post'>
		<div class='form-group'>
			<label for='id_setor_hospital'>Setor Hospitalar</label>
			<select name='id_setor_hospital' class="form-control selectpicker" data-style="btn-info" required>
				<option disabled selected>Selecione o setor hospital</option>
			<?php foreach ($setores_hospital as $num => $setor_hospital): ?>
				<option value='<?php echo $setor_hospital['id']; ?>'><?php echo select('nome', 'setor', 'id', $setor_hospital['id_setor'])['nome']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<div class='form-group'>
			<label for='id_mês'>Mês Avaliado</label>
			<select name='id_mês' class="form-control selectpicker" data-style="btn-info" required>
				<option disabled selected>Selecione o mês a ser avaliado</option>
			<?php foreach ($meses as $num => $mês): ?>
				<option value='<?php echo $mês['id']; ?>'><?php echo $mês['nome']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<?php foreach ($indicadores as $num => $indicador): ?>
		<div id='indicador_<?php echo $indicador["id"]; ?>'>
			<?php echo 'Perguntas do indicador '.$indicador["nome"]; ?>
		</div>



		<?php endforeach; ?>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
			<button class='btn btn-primary' type='submit'>Cadastrar</button>
		</div>
	</form>
</div>