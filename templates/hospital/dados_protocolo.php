<?php 
    $indicador = select('*', 'indicador', 'id', $_GET['id']);
    $protocolo = select('*', 'protocolo', '(id_hospital, id_indicador, ativo)', '('.$_SESSION['hospital'].', '.$_GET['id'].', \'1\')', false);
?>
<div class='text-center'>
	<h2>Dados Indicador <?php echo $indicador['nome']; ?></h2>
	<hr />
</div>
<?php 
	if(!$protocolo){
		echo "<div class='text-center text-danger'><h3>Seu hospital não possui esse protocolo cadastrado. Favor cadastra-lo.</h3></div>";
		include_once('cadastrar_protocolo.php');
	}
	else{
		echo "<div class='text-center text-succes'><h3>Seu hospital tem esse protocolo</h3></div>";
		// include_once('alterar_protocolo.php');
	}
?>