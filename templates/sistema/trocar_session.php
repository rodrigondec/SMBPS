<?php 
    if(count($_GET)>0 && isset($_GET['type'])){

    	echo 'GET: ';var_dump($_GET);echo '<br /><br />';

    	session_destroy();
    	session_start();
    	if($_GET['type'] == '1'){
    		// hospital para admin

    		$usuario = select('*', 'usuario', 'email', 'admin@admin.com');
            $_SESSION['id_usuario'] = $usuario['id'];
    		$_SESSION['email'] = $usuario['email'];
			$_SESSION['privilegio'] = $usuario['id_papel'];
    	}
    	else if($_GET['type'] == '2'){
    		// admin para hospital

    		$usuario = select('*', 'usuario', 'email', 'gestor@hospital.com');
            $_SESSION['id_usuario'] = $usuario['id'];
    		$_SESSION['email'] = $usuario['email'];
			$_SESSION['privilegio'] = $usuario['id_papel'];
			$_SESSION['hospital'] = $usuario['id_hospital'];
    	}

    	echo 'session: ';var_dump($_SESSION);echo '<br /><br />';
    }
    ob_clean();
	header('LOCATION: /'.BASE);
?>