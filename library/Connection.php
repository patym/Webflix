<?php

/*
 * classe TConnection
 * gerencia conexões com bancos de dados através de arquivos de configuração.
 */

final class Connection {
    /*
     * método __construct()
     * não existirão instâncias de TConnection, por isto estamos marcando-o como private
     */

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    /*
     * método open()
     * recebe o nome do banco de dados e instancia o objeto PDO correspondente
     */

    public static function open() {
        $conn = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        // define para que o PDO lance exceções na ocorrência de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // retorna o objeto instanciado.
        return $conn;
    }

}
