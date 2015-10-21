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
                <li><a href="/smbps/index.php/sistema/contato">Contato</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a data-toggle="modal"  data-target="#myModal">
                        Entrar
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">Login</h4>
            </div>
            <div class="modal-body text-center">
                <form action="/smbps/index.php/login" method='post'>
                    <div class='form-group'>
                    <input type='email' name='email' class='form-control' id='input_email' placeholder='Email'  required />
                    <input type='password' name='senha' class='form-control' id='input_senha' placeholder='Senha' style='margin-top: 10px;' required />
                </div>
                <div id='buttons' class='text-right'>
                    <button type='submit' class='btn btn-info'>Entrar</button>
                </div>
            </form>
            </div>
<!--             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>