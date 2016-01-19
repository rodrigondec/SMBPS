<div class='text-center'>
	<h2>Meu Hospital</h2>
	<hr />
</div>
<script type="text/javascript">
	// Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['corechart']});

	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(drawChart);

	// Callback that creates and populates a data table,
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {
		// Create the data table.
		var array_data = new Array(['Mês', 'Limite superior', 'Nota', 'Limite inferior']);

		$.ajax({
		    type: "GET",
		    url: 'http://localhost/smbps/templates/hospital/get_data_grafico.php',
		    data: {id_setor: 1},
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
				var chart = new google.visualization.LineChart(document.getElementById('grafico'));
				chart.draw(data, options);
			}
		});
	}
</script>
<div class='container col-lg-6 center'>
	<div id='grafico'><div>
</div>