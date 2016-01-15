<div class='text-center'>
	<h2>Selecionar Formulário</h2>
	<hr />
</div>
<?php 
    $meses = select_many('id, nome', 'mês');
    $setores_hospital = select_many('*', 'setor_hospital', 'id_hospital', $_SESSION['id_hospital']);
    var_dump($setores_hospital);echo '<br /><br />';
    var_dump($meses);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#enviar').click(function(){
			setor = $("#select_setor").selectpicker("val");
			mes = $("#select_mes").selectpicker("val");
			console.log(setor);
			console.log(mes);
			if(mes != null && setor != null){
				$('#selecter').submit()
			}
			else if(setor == null){
				sa('Erro', 'Selecione o setor desejado', 'error', '', 'btn-danger');
			}
			else if(mes == null){
				sa('Erro', 'Selecione o mês desejado', 'error', '', 'btn-danger');
			}	
		})
	})
</script>
<div class='container'>
	<form class='col-lg-3 col-md-3 col-sm-4 center' id='selecter' method='post' action='<?php echo HOSPITAL.$_GET['action']; ?>_formulario?unst=1'>
		<div class='form-group'>
			<label for='select_setor'>Setor</label>
			<select id='select_setor' name='id_setor' class='form-control selectpicker' data-style="btn-info">
				<option disabled selected value=''>Selecione um setor</option>
				<?php 
				    foreach ($setores_hospital as $key => $setor_hospital):
				?>
				<option value='<?php echo $setor_hospital['id_setor']; ?>'>
					<?php echo select('nome', 'setor', 'id', $setor_hospital['id_setor'])['nome'];?>
				</option>
				<?php
				    endforeach;
				?>
			</select>
		</div>
		<div class='form-group'>
			<label for='select_mes'>Mês</label>
			<select id='select_mes' name='id_mês' class='form-control selectpicker' data-style="btn-info">
				<option disabled selected value=''>Selecione um mês</option>
				<?php 
				    foreach ($meses as $key => $mes):
				?>
				<option value='<?php echo $mes['id']; ?>'>
					<?php echo $mes['nome']?>
				</option>
				<?php
				    endforeach;
				?>
			</select>
		</div>
		<button id='enviar' type='button' class='btn btn-primary'>Selecionar</button>
	</form>
</div>