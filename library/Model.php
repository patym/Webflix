<?php

class Model {
    
    
    /**
     *
     * @var string 
     */
    public $query = NULL;
    
    /**
     *
     * @var obj 
     */
    public $resultSet = NULL;
    

    function __construct() {
        
        $this->db = new Database();
    }

}
