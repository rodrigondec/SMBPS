<?php 
    if(count($_POST) > 0){
    	$dados['ativa'] = 0;
    	var_dump($_POST);echo '<br /><br />';
    	var_dump($dados);
    	update($dados, 'notificação', 'id', $_POST['id']);
    	ob_clean();
    	header('LOCATION: /'.BASE);
    }
?>