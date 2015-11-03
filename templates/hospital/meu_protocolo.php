<?php 
    $indicador = select('*', 'indicador', 'id', $_GET['id']);
    $protocolo = select('*', 'protocolo', '(id_hospital, id_indicador, ativo)', '('.$_SESSION['hospital'].', '.$_GET['id'].', \'1\')', false);
?>
<div class='text-center'>
	<h2>Meu Protocolo <?php echo $indicador['nome']; ?></h2>
	<hr />
</div>
<?php 
	if(!$protocolo){
		echo "<div class='text-center text-danger'><h3>Seu hospital não possui esse protocolo Cadastrado. Favor cadastra-lo.</h3></div>";
		include_once('cadastrar_protocolo.php');
	}
	else{
		echo "<div class='text-center text-warning'><h3>Esse protocolo do seu hospital já é muito antigo. Favor cadastra-lo novamente.</h3></div>";
		include_once('alterar_protocolo.php');
	}
?>