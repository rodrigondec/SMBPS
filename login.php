<?php 
	if(count($_POST) > 0){
		$usuario = select('*', 'usuario', 'email', $_POST['email'], LINK);
		if($usuario && $usuario['senha'] == md5($_POST['senha'])){
			session_start();
			var_dump($usuario);
			$_SESSION['email'] = $usuario['email'];
			$_SESSION['privilegio'] = $usuario['id_papel'];
			if($_SESSION['privilegio'] == '2'){
				$_SESSION['hospital'] = $usuario['id_hospital'];
				var_dump($_SESSION);
			}
			ob_clean();
			header('LOCATION: /smbps/');
		}
	}
?>