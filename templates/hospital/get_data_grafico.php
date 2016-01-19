<?php
	include_once('/../../controle/globais.php');
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');
	header("Content-Type: application/json");

	if(isset ($_GET['callback'])){
		$dados = array();

		$datas = array('', '', '', '', '', '');

		$indicadores = select_many('*', 'indicador');
		// var_dump($indicadores);echo '<br /><br /><br />';

		foreach ($datas as $key => $data){
			$datas[$key]['mes'] = date('M', strtotime(date('Y-m-1')." -".$key." month"));
			$datas[$key]['ano'] = date('Y', strtotime(date('Y-m-1')." -".$key." month"));
		}
		// var_dump($datas);echo '<br /><br />';

		$formularios = array();

		foreach ($datas as $key => $data){
			$row = array();

			$mes = select('*', 'mês', 'abreviação', $data['mes']);
			// var_dump($mes);echo '<br /><br />';
			array_push($row, $mes['nome']);

			$limite_superior = 12;
			array_push($row, $limite_superior);

			$nota = 0;

			$limite_inferior = 3;			

			$id_hospital_setor = select('id', 'hospital_setor', '(id_hospital, id_setor)', '('.$_SESSION['id_hospital'].', '.$_GET['id_setor'].')', false)['id']; // ID PARA O HOSPITAL DO SETOR DE ENFERMAGEM
			// var_dump($id_hospital_setor);echo '<br /><br />';

			$formulario = select('*', 'formulário', '(id_hospital_setor, id_mês, ano)', '('.$id_hospital_setor.', '.$mes['id'].', '.$data['ano'].')', false);
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

			array_push($dados, $row);
			// break;
		}
	    echo $_GET['callback']."(".json_encode($dados).")";
	}
?>