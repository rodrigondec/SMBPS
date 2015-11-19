<nav class="navbar navbar-default navbar-static-top">
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
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Indicadores<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <?php 
                            $indicadores = select_many('*', 'indicador');
                            unset($indicadores[0]);

                            foreach ($indicadores as $key => $value):
                               if($key != 1):
                        ?>
                        <li role="separator" class="divider"></li>
                        <?php 
                            endif;
                        ?>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">
                                <?php echo $indicadores[$key]['nome']; ?><div class='inline'><i class="fa fa-caret-right"></i></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a tabindex="-1" href="<?php echo HOSPITAL.'dados_protocolo?id='.$indicadores[$key]['id']; ?>">
                                        Dados
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo HOSPITAL.'meu_protocolo?id='.$indicadores[$key]['id']; ?>">
                                        Meu Protocolo
                                    </a>
                                </li>
                            </ul>
                            <?php 
                                    // echo "<a href='".HOSPITAL."protocolo?id=".$indicadores[$key]["id"]."'>";
                                    // echo $indicadores[$key]['nome'];
                                    // echo "</a>";
                            ?>
                        </li>
                        <?php 
                            endforeach;
                        ?>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Relatório<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="<?php echo HOSPITAL; ?>meu_hospital">Meu hospital</a>
                        </li>
                        <li>
                            <a href="<?php echo HOSPITAL; ?>estatisticas_gerais">Estatísticas gerais</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="<?php echo HOSPITAL; ?>cadastrar_formulario">Cadastrar Formulário</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php 
                $notificacoes = select_many('*', 'notificação', '(id_usuário, ativa)', '('.$_SESSION['id_usuario'].', 1)', false);
                if(count($notificacoes) > 0):
            ?>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Notificações <span class="badge"><?php echo count($notificacoes); ?> <span class="caret"></span></span></a>
                    <ul class='dropdown-menu'>
                    <?php 
                        foreach($notificacoes as $key => $value):
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
                        <li><a href="#">Não há notificações ativas</a></li>
                    </ul>
                </li>
            <?php 
                endif;
            ?>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'><i class="fa fa-cog"></i>&nbsp;Opções<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo SISTEMA; ?>meus_dados">Meus dados</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" onclick="log_out()">Sair</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo SISTEMA; ?>trocar_session?type=1">Trocar Sessão</a></li>
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