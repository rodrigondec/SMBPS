<div class='text-center'>
	<h2>Meus dados</h2>
	<hr />
</div>
<?php 
	$usuario = select('*', 'usuário', 'id', $_SESSION["id_usuario"]);
	var_dump($usuario);echo '<br /><br />';
?>
<div class='container'>
	TSTESTESYE
</div>