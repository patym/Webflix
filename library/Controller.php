<?php

class Controller {
    public $err = NULL;
    
    /**
     *  
     * @var mixed Mensagens de retorno do webservice
     */
        public $model = NULL;
        public $view = NULL;
            
    function __construct() {
        $this->view = new View();
    }

    public function loadModel($name) {
        
        $path = 'application/models/' . $name . '_Model.php';

        if (file_exists($path)) {
            require 'application/models/' . $name . '_Model.php';

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }
    

}