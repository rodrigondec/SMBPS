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
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri); //Separando URI dos Parametros Get
        $uri = $uri[0]; //Apenas URI (ignorando Parametros Get)
        $uri = rtrim($uri, '/'); //Removendo última barra da URI
        $partes = explode('/', $uri);

        if(count($partes) >= 3) { //Tenha mais de 4 partes
            $arquivo = array_pop($partes); //Último elemento
            $pasta = array_pop($partes); //Penúltimo elemento


            // VERIFICAÇÃO DE PERMISSÃO
            

            // END VERIFICAÇÃO
        } 
        else {
            $pasta = 'sistema';
            $arquivo = 'home';            
        }
        $caminho = montar_include($pasta, $arquivo);
        include_once($caminho);   
    }
?>