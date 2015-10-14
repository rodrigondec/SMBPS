<div align='center' style='margin-top:5%; margin-bottom:2%;'>
	<h2>Login</h2>
</div>
<div class='form-boot-40'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
			<div class='form-group'>
			<input type='text' name='email' class='form-control' id='input_email' placeholder='Email' onblur="if(this.value != ''){validar_email(this)}" required />
			<input type='password' name='senha' class='form-control' id='input_senha' placeholder='Senha' style='margin-top: 10px;' required />
			</div>
			<div id='buttons' class='text-center'>
				<button type='submit' class='btn btn-default'>Submit</button>
			</div>
		</form>
	</div>

<?php 
	if(count($_POST) > 0){
		$usuario = select('*', 'usuario', 'email', $_POST['email'], LINK);
		if($usuario && $usuario['senha'] == md5($_POST['senha'])){
			var_dump($usuario);
			$_SESSION['email'] = $usuario['email'];
			$_SESSION['privilegio'] = $usuario['id_papel'];
			ob_clean();
			header('LOCATION: /smbps/');
		}
	}
?>