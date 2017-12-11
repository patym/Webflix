<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
    }

function index(){

  $this->view->render('admin/index', 'admin');
}

function usuarios(){

  require_once 'application/models/Usuario_Model.php';
  $model_usuario = new Usuario_Model();

  $this->view->usuarios = $model_usuario->getAllusers();
  $this->view->render('admin/usuarios', 'admin');
}

function filmes(){

  if ($_POST['filme']){
  $busca = $_POST['filme'];
  $this->view->resultadoBusca = $this->getFilmesByName($busca);
  $this->view->digitado =  $busca;
  }
  $this->view->render('admin/filmes', 'admin');
}

function atores(){

  if ($_POST['ator']){
  $busca = $_POST['ator'];
  $this->view->resultadoBusca = $this->getAtoresByName($busca);
  $this->view->digitado =  $busca;
  }

  $this->view->render('admin/atores', 'admin');
}


function getFilmesByName($filme_nome){
  require_once 'library/IMDb.php';
  $imdb = new IMDb();
  $resultado = $imdb->find_by_title($filme_nome);

  if($resultado['response'] == 1){
    unset($resultado['response']);
    unset($resultado['response_msg']);
  }
//  echo "<pre>";
// var_dump($resultado);
  return $resultado;
}

function getAtoresByName($ator_nome){
  require_once 'library/IMDb.php';
  $imdb = new IMDb();
  $resultado = $imdb->person_by_name($ator_nome);

  if($resultado['response'] == 1){
    unset($resultado['response']);
    unset($resultado['response_msg']);
  }
//  echo "<pre>";
// var_dump($resultado);
  return $resultado;
}






//Fecha Controller
  }
