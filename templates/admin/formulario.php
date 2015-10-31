<style type="text/css">
	
	h5{
		color: gray;
	}
	p{
		margin-top: 2%;
		font-weight: bold;
	}
	span.obrigatorio{
		font-weight: normal;
		color: red;
	}
</style>

<?php 
    $perguntas = select_many('*', 'pergunta');
    // var_dump($perguntas);
?>

<h1 align="center">MONITORAMENTO DOS INDICADORES DE BOAS PRÁTICAS</h1>
<div align='center' style='margin-left:25%;margin-right:25%'>
	<div align='left'>
	<br /><br /><br />
	<span class='obrigatorio'>*obrigatorio</span>
	<br /><br />

	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>

	<?php 
	    foreach ($perguntas as $key => $value):
	    	$pergunta_inputs = select_many('*', 'pergunta_input', 'id_pergunta', $perguntas[$key]['id']);
	    	// var_dump($pergunta_inputs);echo '<br /><br />';
	    	foreach ($pergunta_inputs as $key2 => $value) {
	    		$inputs[$key2] = select('*', 'input', 'id', $pergunta_inputs[$key2]['id_input']);
	    	}
	    	// var_dump($inputs);
	?>
		<div>
			<p>
				<?php 
				    echo $perguntas[$key]['texto'];
				    if($perguntas[$key]['obrigatória'] == '1'){echo " <span class='obrigatorio'>*</span>";}
				?>
				<h5>
					<?php 
				    	echo $perguntas[$key]['observação'];
				    ?>
				</h5>
			</p>
			<?php 
			    foreach ($pergunta_inputs as $key2 => $value) {
			    	echo "<div>";

		    		echo "<input ";
		    		echo "type='".$inputs[$key2]['type']."' ";
		    		echo "name='".$pergunta_inputs[$key2]["name"]."' ";
		    		echo "value='".$inputs[$key2]["value"]."'";
		    		if($perguntas[$key]['obrigatória'] == '1'){
		    			echo " required";
		    		}
		    		echo " />";

		    		if($inputs[$key2]['type'] == 'radio'){
		    			echo $inputs[$key2]["value"];
		    		}

		    		echo "</div>";
		    	}
			?>
		</div>
	
	<?php
	    endforeach;
	?>

	<input type='submit' value='Enviar' />
	<input type='reset' value='Apagar' />

	</form>
	</div>
</div>

<?php 
    if(count($_POST) > 0){
    	echo 'post antes json: ';
    	var_dump($_POST);

    	$json = json_encode($_POST);
    	echo '<br><br>Json: ';
    	var_dump($json);

    	$dados = json_decode($json);
    	echo '<br><br>post depois json: ';
    	var_dump($dados);
    }
?>