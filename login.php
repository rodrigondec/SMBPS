<div class='text-center' style='margin-top:5%; margin-bottom:2%;'>
	<h2>Entrar</h2>
</div>
<div class='form-boot-40'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<div class='form-group'>
		<input type='email' name='email' class='form-control' id='input_email' placeholder='Email'  required />
		<input type='password' name='senha' class='form-control' id='input_senha' placeholder='Senha' style='margin-top: 10px;' required />
		</div>
		<div id='buttons' class='text-center'>
			<button type='submit' class='btn btn-default'>Entrar</button>
		</div>
	</form>
</div>

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