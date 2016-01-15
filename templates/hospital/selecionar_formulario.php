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
	var neededData; 
	$(document).ready(function(){
		$('#select_mes').change(function(){
			setor = $("#select_setor").selectpicker("val");
			mes = $("#select_mes").selectpicker("val");
			if(mes != null && setor != null){
				$.ajax({
			        type: "GET",
			        url: 'http://localhost/smbps/templates/hospital/get_formulario.php',
			        data: {id_mes: mes, id_setor: setor},
			        dataType: "jsonp",
			        success: function(data){
			        	neededData = data;
			        	console.log(neededData);
			    	}
				});	
			}
			else if(mes != null){
				sa('Erro', 'Selecione o setor desejado', 'error', '', 'btn-danger');
			}					
		})
	})
</script>
<div class='container'>
	<form class='col-lg-3 col-md-3 col-sm-4 center' name='form_mes'>
		<div class='form-group'>
			<label for='select_setor'>Setor</label>
			<select id='select_setor' class='form-control selectpicker' data-style="btn-info">
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
			<select id='select_mes' class='form-control selectpicker' data-style="btn-info">
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
	</form>
</div>