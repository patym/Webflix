<?php

/*
 * classe TTransaction
 * esta classe provê os métodos necessários manipular transações
 */

final class Transaction{

    private static $conn;   // conexão ativa
    private static $logger; // objeto de LOG

    /*
     * método __construct()
     * Está declarado como private para impedir que se crie instâncias de TTransaction
     */

    private function __construct() {
    }

    /*
     * método open()
     * Abre uma transação e uma conexão ao BD
     */

    public static function open() {
        // abre uma conexão e armazena na propriedade estática $conn
        if (empty(self::$conn)) {
            self::$conn = Connection::open();
            // inicia a transação
            self::$conn->beginTransaction();
        }
    }

    /*
     * método get()
     * retorna a conexão ativa da transação
     */

    public static function get() {
        // retorna a conexão ativa
        return self::$conn;
    }

    /*
     * método rollback()
     * desfaz todas operações realizadas na transação
     */

    public static function rollback() {
        if (self::$conn) {
            // desfaz as operações realizadas durante a transação
            self::$conn->rollback();
        }
    }

    /*
     * método close()
     * Aplica todas operações realizadas e fecha a transação
     */

    public static function close() {
        if (self::$conn) {
            // aplica as operações realizadas
            // durante a transação
            self::$conn->commit();
        }
    }

}
