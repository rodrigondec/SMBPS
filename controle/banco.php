<?php
    // função que executa SQL para insert
    // INSERT INTO $tabela ($chaves,...) VALUES ($valores)
    function insert($dados, $tabela) {
        $sql = 'INSERT INTO '.$tabela;
        $chaves = array();
        $valores = array();
        foreach ($dados as $chave => $valor) {
            $chaves[] = $chave;
            $valores[] = '\''.$valor.'\'';
        }
        $str_chaves = implode(',', $chaves);
        $str_valores = implode(',', $valores);

        $sql .= ' ('.$str_chaves.') VALUES ('.$str_valores.');';
        // var_dump($sql);
        return mysql_query($sql, LINK);
    }

    // função que executa SQL para DELETE
    // DELETE FROM $tabela WHERE id=$id
    function delete($id, $tabela) {
        $sql = 'DELETE FROM '.$tabela.' WHERE id='.$id.';';
        return mysql_query($sql, LINK);
        // var_dump($sql);
    }

    // função que executa SQL para UPDATE
    // UPDATE $tabela SET $chave=$valor,... WHERE id=$id
    function update($dados, $tabela, $restricao, $id) {
        $sql = 'UPDATE '.$tabela.' SET ';
        $alteracoes = array();
        foreach ($dados as $chave => $valor) {
            $alteracoes[] = $chave.'=\''.$valor.'\'';
        }
        $sql .= implode(', ', $alteracoes);
        $sql .= ' WHERE '.$restricao.'=\''.$id.'\';';
        //var_dump($sql);
        return mysql_query($sql, $link);
    }

    // função que executa SQL para SELECT com WHERE
    // SELECT $campo FROM $tabela WHERE ID = $id
    function select($campo, $tabela, $restricao, $id, $link){
        $sql = 'SELECT '.$campo.' from '.$tabela.' WHERE '.$restricao.'=\''.$id.'\' LIMIT 1;';
        $resultado = mysql_query($sql, $link);
        return mysql_fetch_assoc($resultado);        
    }

    // função que executa SQL para SELECT
    // SELECT $campo FROM $tabela
    function select_many($campo, $tabela, $link, $where = ''){
        $sql = 'SELECT '.$campo.' from '.$tabela.' '.$where.';';
        $resultado = mysql_query($sql, $link);
        if(!$resultado) return array();
        $objetos = array();
        while($row = mysql_fetch_assoc($resultado)){
            $objetos[] = $row;
        }
        return $objetos;
    }
?>