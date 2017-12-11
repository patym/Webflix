<?php

define('_OWEB', 1);
define('SYS_DIR', __DIR__);


function __autoload($classe) {
    $pastas = array('library', 'util');
    foreach ($pastas as $pasta) {
        if (file_exists("{$pasta}/{$classe}.php")) {
            include_once "{$pasta}/{$classe}.php";
        }
    }
}

//Configs
require 'config/conf.php';
require 'config/vars.php';


$bootstrap = new Bootstrap();
$bootstrap->init();
