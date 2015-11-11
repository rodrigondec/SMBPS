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
    $perguntas = select_many('*', 'pergunta');
    // var_dump($perguntas);
?>
<div class='text-center'>
	<h2>MONITORAMENTO DOS INDICADORES DE BOAS PRÁTICAS</h2>
	<hr />
</div>
<div class='container'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<p class='obrigatorio'><span class='obrigatorio'>*obrigatorio</span></p>

		<?php 
	    foreach ($perguntas as $key => $value):
	    	$pergunta_inputs = select_many('*', 'pergunta_input', 'id_pergunta', $perguntas[$key]['id']);
	    	// var_dump($pergunta_inputs);echo '<br /><br />';
	    	foreach ($pergunta_inputs as $key2 => $value) {
	    		$inputs[$key2] = select('*', 'input', 'id', $pergunta_inputs[$key2]['id_input']);
	    	}
	    	// var_dump($inputs);
		?>
		<div class='input'>
			<p>
				<?php 
				    echo $perguntas[$key]['texto'];
				    if($perguntas[$key]['obrigatória'] == '1'){echo " <span class='obrigatorio'>*</span>";}
				    if($perguntas[$key]['observação'] != ''):
				?>
				<h5>
					<?php 
				    	echo $perguntas[$key]['observação'];
				    ?>
				</h5>
				<?php endif; ?>
			</p>
			<?php 
			    foreach ($pergunta_inputs as $key2 => $value) {
			    	echo "<div>";

		    		echo "<input ";
		    		if($inputs[$key2]['type'] != 'radio'){
		    			echo "class='form-control'";
		    		}
		    		echo "type='".$inputs[$key2]['type']."' ";
		    		echo "name='".$pergunta_inputs[$key2]["name"]."' ";
		    		echo "value='".$inputs[$key2]["value"]."'";
		    		if($perguntas[$key]['obrigatória'] == '1'){
		    			echo " required";
		    		}
		    		echo " />";

		    		if($inputs[$key2]['type'] == 'radio'){
		    			echo " ".$inputs[$key2]["value"];
		    		}

		    		echo "</div>";
		    	}
			?>
		</div>
	
	<?php
	    endforeach;
	?>
		<div class='text-center'>
			<input class='btn btn-primary' type='submit' value='Enviar' />
			<input class='btn btn-danger' type='reset' value='Apagar' />
		</div>	
	</form>
</div>

<?php 
    if(count($_POST) > 0){
    	
    }
?>