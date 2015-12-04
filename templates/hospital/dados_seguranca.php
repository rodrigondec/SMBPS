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
<?php 
    $indicador = select('*', 'indicador', 'nome_reduzido', 'seguranca');
    $perguntas = select_many('*', 'pergunta', 'id_indicador', $indicador['id']);
?>
<div class='text-center'>
	<h2>Dados Indicador <?php echo $indicador['nome']; ?></h2>
	<hr />
</div>
<div class='container col-lg-6 center'>
	<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		<p class='obrigatorio'><span class='obrigatorio'>*obrigatorio</span></p>
		<div class="input">
			<p>
				1 - O serviço de saúde possui núcleo de segurança do paciente(NSP) implantado? <span class="obrigatorio">*</span>
			</p>
			<div class="radio">
	  			<label><input type="radio" name="nsp" value="Sim" required>Sim</label>
			</div>
			<div class="radio">
			  	<label><input type="radio" name="nsp" value="Não" required>Não</label>
			</div>
		</div>

		<div class='input'>
			<div class='form-group'>
				<label for="data">Data</label>
				<input class='form-control' type='date' name='data_nsp' />
			</div>
			<div class='form-group'>
				<label for="imagem">Imagem</label>
				<input id="input-1" type="file" class="file" name='imagem_nsp' enctype="multipart/form-data" />
			</div>
		</div>

		<div class="input">
			<p>
				2 - O serviço de saúde possui plano de segurança do paciente(PSP) implantado? <span class="obrigatorio">*</span>
			</p>
			<div class="radio">
	  			<label><input type="radio" name="psp" value="Sim" required>Sim</label>
			</div>
			<div class="radio">
			  	<label><input type="radio" name="psp" value="Não" required>Não</label>
			</div>		
		</div>
		
		<div class='input'>
			<div class='form-group'>
				<label for="data">Data</label>
				<input class='form-control' type='date' name='data_psp' />
			</div>
			<div class='form-group'>
				<label for="imagem">Imagem</label>
				<input id="input-1" type="file" class="file" name='imagem_psp' enctype="multipart/form-data" />
			</div>
		</div>

		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
			<button class='btn btn-primary' type='submit'>Enviar</button>
		</div>	
	</form>
</div>

<?php 
    if(count($_POST) > 0){
    	var_dump($_POST);echo '<br /><br />';
    	var_dump($_FILES);
    }
?>