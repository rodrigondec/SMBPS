<div class='text-center'>
	<h2>Meus dados</h2>
	<hr />
</div>
<?php 
	$usuario = select('*', 'usuário', 'id', $_SESSION["id_usuario"]);
?>
<div class='container'>
	<div>
		<div id='usuario' class='col-md-4 text-center'>
			<form action="/<?php echo BASE; ?>index.php/login" method='post'>
                <div class='form-group'>
                    <label for='email'>Email</label>
                    <input type='email' name='email' class='form-control' id='input_email' placeholder='Email'  required />
                </div>
                <div class='form-group'>
                    <label for='senha'>Senha</label>
                    <input type='password' name='senha' class='form-control' id='input_senha' placeholder='Senha' required />
                </div>
                <div id='buttons' class=''>
                    <input type='reset' value='Apagar' class='btn btn-warning' />
                    <input type='submit' value='Entrar' class='btn btn-primary' />
                    ou
                    <a href="<?php echo SISTEMA; ?>cadastro">Registre-se</a>
                </div>
            </form>
			<?php 
			    var_dump($usuario);echo '<br /><br />';
			?>
		</div>
	</div>
</div>