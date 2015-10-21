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
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Admin<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/admin/">PHPMyAdmin</a>
                            <a href="/smbps/index.php/configs">Configurações</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Hospital<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/admin/listar_hospitais">Listar</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Formulário<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/admin/listar_formularios">Listar</a>
                            <a href="/smbps/index.php/admin/formulario">Cadastrar</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Usuarios<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/admin/listar_usuarios">Listar</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Papéis<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/admin/listar_papeis">Listar</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Indicadores<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/admin/listar_indicadores">Listar</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Protocolos<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/admin/listar_protocolos">Listar</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Imagens<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href="/smbps/index.php/admin/listar_imagens">Listar</a>
                        </li>
                    </ul>
                </li>
                <!-- <li><a href="/smbps/index.php/admin/home">Sobre</a></li> -->
                <!-- <li><a href="/smbps/index.php/sistema/contato">Contato</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" onclick="log_out()">logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>