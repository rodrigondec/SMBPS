<div class='text-center'>
	<h2>Meus dados</h2>
	<hr />
</div>
<?php 
    $senha_inconsistente = false;
    $update['status'] = false;
    if(count($_POST) > 0):
        if($_POST['form'] == 'dados'):
            $update['status'] = true;
        elseif($_POST['form'] == 'senha'):
            if($_POST['senha'][0] == $_POST['senha'][1]):
                $update['status'] = true;
                $_POST['senha'] = md5($_POST['senha'][0]);
            else:
                swal('Senhas não batem!', 'Sua senha não foi alterada pois a confirmação da senha falhou', 'error', '', 'btn-primary');
            endif;
        else:
            exit("ERROR!");
        endif;
        /* UPDATE DOS DADOS */
        if($update['status']){
            $dados = array();
            foreach ($_POST as $key => $value) {
                if($key != 'form'){
                    $dados[$key] = $value;
                }
            }
            update($dados, 'usuário', 'id', $_SESSION["id_usuario"]);
        }
    endif;

	$usuario = select('*', 'usuário', 'id', $_SESSION["id_usuario"]);
?>
<div class='container'>
	<!-- DADOS USUÁRIO -->
    <div id='usuario' class='col-md-5 col-lg-5 col-sm-5 col-xs-6 center'>
        <!-- FORM DADOS -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Informações do Usuário</h3>
            </div>
            <div class="panel-body">
                <form method='post'>
                    <input class='hidden' type='text' name='form' value='dados' />
                    <div class='form-group'>
                        <label for='nome'>Nome</label>
                        <input type='nome' name='nome' class='form-control' placeholder='Nome' value='<?php echo $usuario['nome']; ?>' required />
                    </div>
                    <div class='form-group'>
                        <label for='email'>Email</label>
                        <input type='email' name='email' class='form-control' placeholder='Email' value='<?php echo $usuario['email']; ?>' required />
                    </div>
                    <div id='buttons'>
                        <input type='submit' value='Alterar' class='btn btn-primary' />
                    </div>
                </form>
            </div>
        </div>
        <!-- FORM SENHA -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Mudar Senha</h3>
            </div>
            <div class="panel-body">
                <form method='post' id='form_senha'>
                    <input class='hidden' type='text' name='form' value='senha' />
                    <div class='form-group' id='group_senha1'>
                        <label for='senha[]'>Nova Senha</label>
                        <div class='input-group'>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-minus" id='glyp_senha1'></span>
						</span>
                        	<input type='password' name='senha[]' id='senha1' class='form-control' placeholder='Digite sua nova senha' onkeyup="validar_senha()" required />
                        </div>
                    </div>
                    <div class='form-group' id='group_senha2'>
                        <label for='senha[]'>Confirmar Senha</label>
                        <div class='input-group'>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-minus" id='glyp_senha2'></span>
						</span>
                        	<input type='password' name='senha[]' id='senha2' class='form-control' placeholder='Repeta sua senha' onkeyup="validar_senha()" required />
                        </div>
                    </div>
                    <div>
                        <input type='reset' value='Apagar' class='btn btn-danger' />
                        <input type='submit' value='Alterar' class='btn btn-primary' />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>