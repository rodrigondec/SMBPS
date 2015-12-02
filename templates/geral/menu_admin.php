<nav class="navbar navbar-default navbar-static-top" role='navigation'>
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/<?php echo BASE; ?>">Página inicial</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id='navbar' class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Admin<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="/phpmyadmin">PHPMyAdmin</a></li>
                        <li><a href="/<?php echo BASE; ?>index.php/configs">Configurações</a></li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Hospital<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMIN; ?>listar_hospitais">Listar</a></li>
                        <li><a href="<?php echo ADMIN; ?>cadastrar_hospital">Cadastrar</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Relatórios<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Por Hospital</a></li>
                                <li><a href="#">Indices Gerais</a></li>
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Protocolos<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a tabindex="-1" href="<?php echo ADMIN; ?>listar_protocolos">Listar</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="#">Imagens<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                                    <ul class="dropdown-menu">
                                      <li><a tabindex="-1" href="<?php echo ADMIN; ?>listar_imagens">Listar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul> 
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Formulário<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMIN; ?>listar_formularios">Listar</a></li>
                        <li><a href="<?php echo ADMIN; ?>formulario">Cadastrar</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Indicadores<div class='inline'><i class="fa fa-caret-right"></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo ADMIN; ?>listar_indicadores">listar</a></li>                 
                                <li><a href="<?php echo ADMIN; ?>cadastrar_indicador">Cadastrar</a></li>
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Perguntas<div class='inline'><i class="fa fa-caret-right"></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo ADMIN; ?>listar_perguntas">listar</a></li>            
                                <li><a href="<?php echo ADMIN; ?>cadastrar_pergunta">Cadastrar</a></li>
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Respostas<div class='inline'><i class="fa fa-caret-right"></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo ADMIN; ?>listar_respostas">listar</a></li>            
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Usuários<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMIN; ?>listar_usuarios">Listar</a></li>
                        <li><a href="<?php echo ADMIN; ?>cadastrar_usuario">Cadastrar</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Papéis<div class='inline'><i class="fa fa-caret-right"></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo ADMIN; ?>listar_papeis">Listar</a></li>
                                <li><a href="<?php echo ADMIN; ?>cadastrar_papel">Cadastrar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                	<a href="#" class='dropdown-toggle' data-toggle='dropdown'>Informes<span class='caret'></span></a>
                	<ul class='dropdown-menu'>
                		<li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Mensagens<div class='inline'><i class="fa fa-caret-right"></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo ADMIN; ?>listar_mensagens">listar</a></li>                 
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Notificações<div class='inline'><i class="fa fa-caret-right"></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo ADMIN; ?>listar_notificacoes">listar</a></li>                 
                                <li><a href="<?php echo ADMIN; ?>cadastrar_notificacao">Cadastrar</a></li>
                            </ul>
                        </li>
                	</ul>
                </li>
                <!-- <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Indicadores<span class="caret"></span></a>
                    <ul class='dropdown-menu'>  
                        <li><a href="<?php echo ADMIN; ?>listar_indicadores">Listar</a></li>
                        <li><a href="#">Cadastrar</a></li>
                    </ul>
                </li> -->
                
                <!-- <li><a href="<?php echo ADMIN; ?>home">Sobre</a></li> -->
                <!-- <li><a href="<?php echo SISTEMA; ?>contato">Contato</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php 
                $usuario_notificacoes = select_many('*', 'usuário_notificação', '(id_usuário, ativa)', '('.$_SESSION['id_usuario'].', 1)', false);
                $notificacoes = array();
            	foreach ($usuario_notificacoes as $key => $value) {
            		$notificacoes[$key] = select('*', 'notificação', 'id', $value['id_notificação']);
            	}
                if(count($usuario_notificacoes) > 0):
            ?>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'><!-- <i class="fa fa-bell-o"></i>&nbsp; -->Notificações <span class="badge"><?php echo count($notificacoes); ?> <span class="caret"></span></span></a>
                    <ul class='dropdown-menu'>
                    <?php 
                        foreach ($notificacoes as $key => $value):
                            if($key != 0):
                    ?>
                        <li role="separator" class="divider"></li>
                    <?php 
                        endif;
                    ?>
                        <li>
                            <a data-toggle="modal" data-target="#myModalnotificacao<?php echo $notificacoes[$key]['id']; ?>"><?php echo $notificacoes[$key]['título']; ?></a>
                        </li>
                    <?php 
                        endforeach;
                    ?>
                    </ul>
                </li>
            <?php 
                else:
            ?>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'><!-- <i class="fa fa-bell-slash-o"></i>&nbsp; -->Notificações <span class="badge"><?php echo count($notificacoes); ?> <span class="caret"></span></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="#">Não há notificações!</a></li>
                    </ul>
                </li>
            <?php 
                endif;
            ?>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'><i class="fa fa-cog"></i>&nbsp;Opções<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMIN; ?>meus_dados">Meus dados</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" <?php echo "onclick='log_out(\"".BASE."\")'"; ?>>Sair</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo SISTEMA; ?>trocar_session?type=2">Trocar Sessão</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php 
    if(count($notificacoes) > 0):
        foreach ($notificacoes as $key => $value):
?>
<!-- Modal -->
<div id="myModalnotificacao<?php echo $notificacoes[$key]['id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">Notificação</h4>
            </div>
            <div class="modal-body text-center">
                <p>
                    <?php 
                        echo $notificacoes[$key]['texto'];
                    ?>
                </p>
                <form action="<?php echo SISTEMA?>desativar_notificacao" method='post'>
                    <input type='number' name='id' value='<?php echo $notificacoes[$key]['id']; ?>' hidden required />
                    <button class="btn btn-danger">Remover Notificação</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
        endforeach;
    endif;
?>