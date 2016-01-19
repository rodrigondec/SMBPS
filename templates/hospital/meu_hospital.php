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
		var array_data = new Array();
		var row_head = ['Mês', 'Ótimo', 'Real', 'Ruim'];
		array_data.push(row_head);


		var rows_body = new Array();
		// console.log(rows_body);
		rows_body.push(['Janeiro', 12, 7, 3]);
		// console.log(rows_body);
		rows_body = [['Janeiro', 12, 7, 3],
			['Fevereiro', 12, 2, 3],
			['Abril', 12, 13, 3],
			['Maio', 12, 8, 3],
			['Abril', 12, 5, 3]];
		// console.log(rows_body);



		for (var i = 0; i <= rows_body.length - 1; i++) {
			array_data.push(rows_body[i]);
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
</script>
<div class='container col-lg-6 center'>
	<?php 
		$data = array();

		$meses = array('', '', '', '', '', '');

		$indicadores = select_many('*', 'indicador');
		// var_dump($indicadores);echo '<br /><br /><br />';

		foreach ($meses as $key => $mes){
			$meses[$key] = date('M', strtotime(date('Y-m-1')." -".$key." month"));
		}
		// var_dump($meses);echo '<br /><br />';

		$formularios = array();

		foreach ($meses as $key => $abrev_mes){
			$row = array();

			$mes = select('*', 'mês', 'abreviação', $abrev_mes);
			// var_dump($mes);echo '<br /><br />';
			array_push($row, $mes['nome']);

			$limite_superior = 12;
			array_push($row, $limite_superior);

			$nota = 0;

			$limite_inferior = 3;			

			$id_hospital_setor = select('id', 'hospital_setor', '(id_hospital, id_setor)', '('.$_SESSION['id_hospital'].', 1)', false)['id']; // ID PARA O HOSPITAL DO SETOR DE ENFERMAGEM
			// var_dump($id_hospital_setor);echo '<br /><br />';

			$formulario = select('*', 'formulário', '(id_hospital_setor, id_mês, ano)', '('.$id_hospital_setor.', '.$mes['id'].', '.date('Y').')', false);
			// var_dump($formulario);echo '<br /><br />';
			$respostas = array();
			$respostas_conformes = 0;
			if($formulario){
				$respostas = select_many('*', 'resposta', 'id_formulário', $formulario['id']);
				if(!$respostas){
					$respostas = array();
				}
			}
			// var_dump($respostas);echo '<br /><br />';
			foreach($respostas as $key => $resposta) {
				if($resposta['texto'] == 'Sim'){
					$respostas_conformes++;
				}
			}
			// var_dump($respostas_conformes);echo '<br /><br />';

			$nota += $respostas_conformes;

			$protocolos_conformes = 0;
			foreach($indicadores as $key => $indicador) {
				$protocolo = select('*', 'protocolo', '(id_hospital, id_indicador, ativo)', '('.$_SESSION['id_hospital'].', '.$indicador['id'].', 1)', false);
				if($protocolo){
					$protocolos_conformes++;
				}
			}
			// var_dump($protocolos_conformes);echo '<br /><br />';

			$nota += $protocolos_conformes;
			// var_dump($nota);echo '<br /><br />';
			array_push($row, $nota);

			array_push($row, $limite_inferior);
			// var_dump($row); echo '<br /><br />';

			array_push($data, $row);
			// break;
		}
		// var_dump($data);echo '<br /><br />';
	?>
	<div id='grafico'><div>
</div>