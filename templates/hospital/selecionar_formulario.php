<div class='text-center'>
	<h2>Selecionar Formulário</h2>
	<hr />
</div>
<?php 
    $meses = select_many('id, nome', 'mês');
    $hospital_setores = select_many('*', 'hospital_setor', 'id_hospital', $_SESSION['id_hospital']);
    // var_dump($hospital_setores);echo '<br /><br />';
    // var_dump($meses);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#enviar').click(function(){
			acao = $('#select_acao').selectpicker('val');
			setor = $("#select_setor").selectpicker("val");
			mes = $("#select_mes").selectpicker("val");
			if(mes != null && setor != null && acao != null){
				$('#selecter').submit()
			}
			else if(acao == null){
				sa('Operação não disponível', 'Selecione a ação desejada!', 'error', '', 'btn-danger');
			}
			else if(setor == null){
				sa('Operação não disponível', 'Selecione o setor desejado!', 'error', '', 'btn-danger');
			}
			else if(mes == null){
				sa('Operação não disponível', 'Selecione o mês desejado!', 'error', '', 'btn-danger');
			}	
		})
		$('#select_acao').change(function(){
			acao = $(this).selectpicker('val');
			$('#selecter').attr('action', acao+'_formulario');
		})
	})
</script>
<div class='container'>
	<form class='col-lg-3 col-md-3 col-sm-4 center' id='selecter' method='get' action='<?php echo HOSPITAL.$_GET['action']; ?>_formulario'>
		<div class='form-group'>
			<label for='select_acao'>Ação</label>
			<select id='select_acao' class='form-control selectpicker' data-style="btn-info">
				<option disabled <?php if(!isset($_GET['action'])){ echo 'selected'; } ?> value=''>
					Selecione uma ação
				</option>
				<option <?php if(isset($_GET['action'])){ if($_GET['action'] == 'cadastrar'){ echo 'selected'; } } ?> value='cadastrar'>
					Cadastrar
				</option>
				<option <?php if(isset($_GET['action'])){ if($_GET['action'] == 'visualizar'){ echo 'selected'; } } ?> value='visualizar'>
					Visualizar
				</option>
			</select>
		</div>
		<div class='form-group'>
			<label for='select_setor'>Setor</label>
			<select id='select_setor' name='id_setor' class='form-control selectpicker' data-style="btn-info">
				<option disabled selected value=''>Selecione um setor</option>
				<?php 
				    foreach ($hospital_setores as $key => $hospital_setor):
				?>
				<option value='<?php echo $hospital_setor['id_setor']; ?>'>
					<?php echo select('nome', 'setor', 'id', $hospital_setor['id_setor'])['nome'];?>
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