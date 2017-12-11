<?php

/**
 * BootStrap responsável pela inicialização do sistema
 * @package Library
 * 
 */
class Bootstrap {

    private $_url = null;
    private $_controller = null;
    private $_controllerPath = 'application/controllers/'; // Sempre incluir "/" no final
    private $_modelPath = 'application/models/'; // Sempre incluir "/" no final
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    /**
     * 
     * Toda vez que o bootstrap é instanciando o tempo de logoff é setado novamente
     */
    function __construct() {
        if (isset($_SESSION[SESSION_LOGIN])) {
            $util = new util();
            $_SESSION[SESSION_LOGIN]->lastAccess = $util->dateFutureMinutes(TEMPO_INATIVO);
        }
    }

    /**
     * Inicia o Bootstrap
     * 
     * @return boolean
     */
    public function init() {
        // Seta the protected $_url
        $this->_getUrl();

        // Carrega o controller padrão se a  URL não estiver setada
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }

        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

    /**
     * (Opcional) Seta um caminho customizado para o controlador
     * @param string $path
     */
    public function setControllerPath($path) {
        $this->_controllerPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Seta um caminho customizado para um model
     * @param string $path
     */
    public function setModelPath($path) {
        $this->_modelPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Seta um caminho customizado para um model
     * @param string $path Use the file name of your controller, eg: error.php
     */
    public function setErrorFile($path) {
        $this->_errorFile = trim($path, '/');
    }

    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: index.php
     */
    public function setDefaultFile($path) {
        $this->_defaultFile = trim($path, '/');
    }

    /**
     * Fetches the $_GET from 'url'
     */
    private function _getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = urldecode($url);
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * This loads if there is no GET parameter passed
     */
    private function _loadDefaultController() {
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }

    /**
     * Load an existing controller if there IS a GET parameter passed
     * 
     * @return boolean|string
     */
    private function _loadExistingController() {
        $file = $this->_controllerPath . $this->_url[0] . '.php';

        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            return false;
        }
    }

    /**
     * If a method is passed in the GET url paremter
     * 
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Metodo
     *  url[2] = Parametro
     *  url[3] = Parametro
     *  url[4] = Parametro
     */
    private function _callControllerMethod() {
        $length = count($this->_url);

        // Verifica se o metodo chamado existe
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
            }
        }

        // Determina o metodo a carregar
        switch ($length) {
            case 5:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;

            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;

            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;

            case 2:
                $this->_controller->{$this->_url[1]}();
                break;

            default:
                $this->_controller->index();
                break;
        }
    }

    /**
     * Exibe a pagina de erro
     * 
     * @return boolean
     */
    private function _error() {

        require $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        exit;
    }

}
