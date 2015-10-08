<?php 
    // conexão com banco database oxe
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    if (!$link) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME, $link);

?>
<div align='center' style='margin-top:5%; margin-bottom:2%;'>
	<h2>Login</h2>
</div>
<div class='form-boot-40'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
			<div class='form-group'>
			<input type='text' name='login' class='form-control' id='input_login' placeholder='Email' required />
			<input type='password' name='senha' class='form-control' id='input_senha' placeholder='Senha' style='margin-top: 10px;' required />
			</div>
			<div id='buttons'>
				<button type='submit' class='btn btn-default'>Submit</button>
			</div>
		</form>
	</div>

<?php 
	if(count($_POST) > 0){
		$usuario = select('*', 'admins', 'login', $_POST['login'], $link);
		if($usuario && $usuario['senha'] == md5($_POST['senha'])){
			$_SESSION['login'] = $usuario['login'];
			$_SESSION['privilegio'] = 'admin';
			ob_clean();
			header('LOCATION: /index.php/admin/listar_times');
		}
		else{
			$usuario = select('*', 'capitaes', 'login', $_POST['login'], $link);
			if($usuario && $usuario['senha'] == md5($_POST['senha'])){
				$_SESSION['login'] = $usuario['login'];
				$_SESSION['privilegio'] = 'capitao';
				$_SESSION['time'] = $usuario['sigla'];
				ob_clean();
				header('LOCATION: /index.php/cne/time');
			}
			else{
				swal('Login inválido!', 'Verifique e insira novamente seu login e senha', 'error', '');
			}
		}
	}
?>