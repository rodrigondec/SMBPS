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
		var data = google.visualization.arrayToDataTable([
			['Mês', 'Ótimo', 'Real', 'Ruim'],
			['Janeiro', 12, 7, 3],
			['Fevereiro', 12, 2, 3],
			['Abril', 12, 13, 3],
			['Maio', 12, 8, 3],
			['Abril', 12, 5, 3]
        ]);

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
</script>
<div class='container col-lg-6 center'>
	<div id='grafico'><div>
</div>