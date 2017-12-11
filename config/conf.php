<?php
//Arquivo encarregado das configurações globais do sistema


// EXIBIÇÃO DE ERROS
ini_set('display_errors', 0);// 1 exibe erros - 0 esconde todos os erros
ini_set('display_startup_erros',0);
ini_set('default_socket_timeout',60);
error_reporting(E_ALL);
///////////////////////////////////////////////////////////////////////////////////////////

date_default_timezone_set("America/Sao_Paulo");

//NOME DA SESSÃO
define('SESSION_LOGIN', 'WEBFLIX');
// BANCO DE DADOS
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'webflix');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// PATHS
define('URL', 'http://localhost/webflix/');
define('URL_SITE', 'http://localhost/webflix/');
//define('URL', 'http://localhost/sistema/webflix/');
//define('URL_SITE', 'http://localhost/sistema/webflix/');

// NOME DO CLIENTE
define('TITLE_SYS', 'Web-Flix');
