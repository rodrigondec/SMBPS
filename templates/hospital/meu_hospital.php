<div class='text-center'>
	<h2>Meu Hospital</h2>
	<hr />
</div>
<?php 
    $indicadores = select_many('id, nome', 'indicador'); 
    echo "<script type='text/javascript'>var num_indicadores = ".count($indicadores).";</script>";
    echo "<script type='text/javascript'>var endereco = '/".BASE."templates/hospital/get_data_grafico.php';</script>";
?>
<script type="text/javascript">
	// Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['corechart']});

	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(drawCharts);


	function drawChart(indicador){
		// Create the data table.
		var array_data = new Array(['Mês', 'Limite superior', 'Nota', 'Limite inferior']);

		$.ajax({
		    type: "GET",
		    url: endereco,
		    data: {id_setor: 1, id_indicador: indicador},
		    dataType: "jsonp",
		    success: function(data){
		    	for(var i = data.length - 1; i >= 0; i--) {
					array_data.push(data[i]);
				};
				// console.log(array_data);
				var data = google.visualization.arrayToDataTable(array_data);

				// Set chart options
				var options = {
		          	title: 'Exemplo de título',
		          	curveType: 'function',
		          	legend: { position: 'top' },
		          	series: {
		          		0: {color: 'green', lineDashStyle: [10, 10]},
		          		1: {color: 'yellow'},
		          		2: {color: 'red', lineDashStyle: [10, 10]}
		          	}
		        };

				// Instantiate and draw our chart, passing in some options.
				var chart = new google.visualization.LineChart(document.getElementById('grafico_'+indicador));
				chart.draw(data, options);
			}
		})
	}


	// Callback that creates and populates a data table,
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawCharts(){
		drawChart(0);
	}

	$(window).resize(function(){
		drawCharts();
	})
</script>
<!-- <div class='container col-lg-6 center'>
	
</div> -->
<div class='container'>
	<!-- MENU DE SELEÇÃO -->
	<div class="list-group col-lg-2 col-md-2 col-sm-2 col-xs-3">
		<a id='nav_indicador_0' class="list-group-item active" onclick='show_hide_indicador(0); drawChart(0);' href="#">
			Geral
		</a>
	<?php 
	    foreach ($indicadores as $num => $indicador):
	?>
		<a id='nav_indicador_<?php echo $indicador['id']; ?>' class="list-group-item" <?php echo "onclick='show_hide_indicador(".$indicador['id']."); drawChart(".$indicador['id'].");'" ?> href="#">
			<?php echo $indicador['nome']; ?>
		</a>
	<?php 
	    endforeach;
	?>
	</div>
	<!-- INDICADORES -->
	<div id='indicador_0' class='col-lg-6 col-md-6 col-sm-5 col-xs-6 center'>
		<h3 class='text-center'>Dados gerais</h3>
		<div id='grafico_0'></div>
	</div>
	<?php 
	    foreach ($indicadores as $num => $indicador):
	?>
	
	<div id='indicador_<?php echo $indicador['id']; ?>' class='col-lg-6 col-md-6 col-sm-5 col-xs-6 center hidden'>
		<h3 class='text-center'><?php echo $indicador['nome']; ?></h3>
		<div id='grafico_<?php echo $indicador['id']; ?>'></div>
	</div>
	<?php 
		endforeach;
	?>	
</div>