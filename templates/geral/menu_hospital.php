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
            <a class="navbar-brand" href="/smbps/">Página inicial</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id='navbar' class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Indicadores<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/sistema/home">Quedas</a>
                            <a href="/smbps/index.php/sistema/sobre">Ulcera por pressão</a>
                            <a href="/smbps/index.php/sistema/contato">Higiena das mãos</a>
                            <a href="/smbps/index.php/sistema/home">Medicação</a>
                            <a href="/smbps/index.php/sistema/sobre">Cirurgia segura</a>
                            <a href="/smbps/index.php/sistema/contato">Identificação</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Relatório<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/hospital/meu_hospital">Meu hospital</a>
                        </li>
                        <li>
                            <a href="/smbps/index.php/hospital/estatisticas_gerais">Estatísticas gerais</a>
                        </li>
                        <li>
                            <a href="/smbps/index.php/hospital/imagem">imagem</a>
                        </li>
                        <li>
                            <a href="/smbps/index.php/hospital/mostrar_imagem">mostrar imagem</a>
                        </li>
                    </ul>
                </li>
                <!-- <li><a href="/smbps/index.php/admin/home">Sobre</a></li> -->
                <!-- <li><a href="/smbps/index.php/sistema/contato">Contato</a></li> -->
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'><i class="fa fa-cog"></i>&nbsp;Opções<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="#" onclick="log_out()">Sair</a></li>
                        <li><a href="/smbps/index.php/sistema/trocar_session?type=1">Trocar Sessão</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>