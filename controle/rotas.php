<?php
    include_once('globais.php');

    function montar_include($pasta, $arquivo) {
        if($arquivo == 'login'){
            return LOGIN;
        }
        else if($arquivo == 'configs'){
            return CONFIGS;
        }
        return TEMPLATES.'/'.$pasta.'/'.$arquivo.'.php';
    }

    function include_conteudo(){
        $include = true;

        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri); //Separando URI dos Parametros Get
        $uri = $uri[0]; //Apenas URI (ignorando Parametros Get)
        $uri = rtrim($uri, '/'); //Removendo última barra da URI
        $partes = explode('/', $uri);

        if(count($partes) >= 3) { //Tenha mais de 3 partes
            $arquivo = array_pop($partes); //Último elemento
            $pasta = array_pop($partes); //Penúltimo elemento


            // VERIFICAÇÃO DE PERMISSÃO
            try{
                if(isset($_SESSION['privilegio'])){
                    if($_SESSION['privilegio'] == '1' && $pasta == 'hospital'){
                        throw new Exception('', 1);
                    }
                    if($_SESSION['privilegio'] == '2' && $pasta == 'admin'){
                        throw new Exception('', 2);
                    }
                }
                else{
                    if($pasta == 'hospital' || $pasta == 'admin'){
                        throw new Exception('', 2);
                    }
                }
            }
            catch (Exception $e){
                $include = false;
                if($e->getCode() == 1){
                    $mensagem = 'Por favor utilize as funcionalidades administrativas, e não hospitalares!';
                    $tipo = 'info';
                }
                else{
                    $mensagem = 'Você não possui privilégio para utilizar essa funcionalidade!';
                    $tipo = 'error';
                }
                swal('Acesso Negado!', $mensagem, $tipo, '/smbps/');
                
            }
            // END VERIFICAÇÃO
        } 
        else{
            if(isset($_SESSION['privilegio'])){
                if($_SESSION['privilegio'] == '1'){
                    $pasta = 'admin';
                }
                if($_SESSION['privilegio'] == '2'){
                    $pasta = 'hospital';
                }
            }
            else{
                $pasta = 'sistema';        
            }
            $arquivo = 'home';  
        }
        $caminho = montar_include($pasta, $arquivo);
        if($include){
            include_once($caminho);
        }   
    }
?>