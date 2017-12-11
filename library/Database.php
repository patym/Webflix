<?php

class Database {

    public $lastInsertID = NULL;

    public function __construct() {
        Transaction::open();
    }

    /**
     * select
     * @param string $sql An SQL string
     * @param array $array Parameters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql) {
        if ($conn = Transaction::get()) {

            $result = $conn->Query($sql);

            // se retornou algum dado
            if ($result) {
                // retorna os dados em forma de objeto
                $object = $result->fetchAll(PDO::FETCH_CLASS);
            }
            return $object;
        } else {
            // se não tiver transação, retorna uma exceção
            throw new Exception('Não há transação ativa!!');
        }
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data) {
        if ($conn = Transaction::get()) {
            try {
                ksort($data);

                $fieldNames = implode('`, `', array_keys($data));
                $fieldValues = ':' . implode(', :', array_keys($data));

                $sth = $conn->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

                foreach ($data as $key => $value) {
                    $sth->bindValue(":$key", $value);
                }

                $sth->execute();
                $this->lastInsertID = $conn->lastInsertId();
            } catch (PDOException $e) {
                print_r($e->getMessage());
                Transaction::rollback();
            }
        } else {
            throw new Exception("Não foi possível conectar ao banco de dados");
        }
    }
    
    
    /**
     * Insere varias linhas de uma unica vez
     * @param type $table
     * @param type $colunas
     * @param type $valores
     * @throws Exception
     */
    public function insertSeveral($table, $colunas, $valores) {
        if ($conn = Transaction::get()) {
            try {
                $sth = $conn->prepare("INSERT INTO $table (`$colunas`) VALUES $valores");
                $sth->execute();
            } catch (PDOException $e) {
                print_r($e->getMessage());
                Transaction::rollback();
            }
        } else {
            throw new Exception("Não foi possível conectar ao banco de dados");
        }
    }
    
    
    public function _query($query) {
        if ($conn = Transaction::get()) {
            try {
                $sth = $conn->prepare($query);
                $sth->execute();
            } catch (PDOException $e) {
                print_r($e->getMessage());
                Transaction::rollback();
            }
        } else {
            throw new Exception("Não foi possível conectar ao banco de dados");
        }
    }

    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where) {
        try {
            $conn = Transaction::get();
            ksort($data);

            $fieldDetails = NULL;
            foreach ($data as $key => $value) {
                $fieldDetails .= "`$key`=:$key,";
            }
            $fieldDetails = rtrim($fieldDetails, ',');

            $sth = $conn->prepare("UPDATE $table SET $fieldDetails WHERE $where");

            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }

            $sth->execute();
            //Transaction::close();
        } catch (PDOException $e) {
            print_r($e->getMessage());
            Transaction::rollback();
        }
    }

    /**
     * delete
     *
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit = 1) {
        try{
            $conn = Transaction::get();
            $conn->exec("DELETE FROM $table WHERE $where LIMIT $limit");
            
        } catch (PDOException $e) {
            print_r($e->getMessage());
            Transaction::rollback();
        }
    }

}
