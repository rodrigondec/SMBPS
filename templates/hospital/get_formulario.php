<?php
	include_once('/../../controle/globais.php');
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');
	header("Content-Type: application/json");

	$array = array(
	    '0' => array('fullName' => 'Meni Samet', 'fullAdress' => 'New York, NY'),
	    '1' => array('fullName' => 'Test 2', 'fullAdress' => 'Paris'),
	);

	if(isset ($_GET['callback'])){
		$id_setor_hospital = select('id', 'setor_hospital', '(id_hospital, id_setor)', '('.$_SESSION['id_hospital'].', '.$_GET['id_setor'].')', false)['id'];
		// $id_formulario = select('id', 'formulário', '(id_mês, ano, id_setor_hospital)', '('.$_GET['mes'].', \'2015\', '.$id_setor_hospital.')', false)['id'];
		// $formulario = select_many('*', 'resposta', 'id_formulário', $id_formulário);

	    echo $_GET['callback']."(".json_encode($array).")";
	}
?>