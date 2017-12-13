<?php

class Usuario extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
    }

function index(){

  $atorFavorito = $this->model->getNomeAtorFavorito($_SESSION[SESSION_LOGIN]->usu_id);

  $this->view->recomendaFilmeByAtor = $this->recomendaFilmesByAtor($atorFavorito);
  $this->view->ator_nomes = $atorFavorito;
  $this->view->render('usuario/index', 'usuario');
}

function filmes(){

  if ($_POST['filme']){
  $busca = $_POST['filme'];
  $this->view->resultadoBusca = $this->getFilmesByName($busca);
  $this->view->digitado =  $busca;
  }
  $this->view->render('usuario/filmes', 'usuario');
}

function atores(){

  if ($_POST['ator']){
  $busca = $_POST['ator'];
  $this->view->resultadoBusca = $this->getAtoresByName($busca);
  $this->view->digitado =  $busca;
  }

  $this->view->render('usuario/atores', 'usuario');
}


function getFilmesByName($filme_nome){
  require_once 'library/IMDb.php';
  $imdb = new IMDb();
  $resultado = $imdb->find_by_title($filme_nome);

  if($resultado['response'] == 1){
    unset($resultado['response']);
    unset($resultado['response_msg']);
  }

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

  return $resultado;
}

function favoritos(){
  $this->view->atores = $this->model->getAtoresFavoritos($_SESSION[SESSION_LOGIN]->usu_id);
  $this->view->filmes = $this->model->getFilmesFavoritos($_SESSION[SESSION_LOGIN]->usu_id);

  $this->view->render('usuario/favoritos', 'usuario');
}

function salvaFilme(){
  $verificador = $this->model->verificaFilmeFavorito($_POST['id'], $_SESSION[SESSION_LOGIN]->usu_id);

  if(empty($verificador) || (int)$verificador == 0){
    $dados = [
      'filme_titulo' => $_POST['titulo'],
      'filme_ano' => $_POST['ano'],
      'filme_atores'=> $_POST['atores'],
      'filme_capa' => $_POST['poster'],
      'filme_usuario_id' => $_SESSION[SESSION_LOGIN]->usu_id,
      'filme_imdb_id' => $_POST['id']
    ];

    try {
        $this->model->salvaFilmeFavorito($dados);
        $retorno  = [
          'status' => 1,
          'msg' => 'Favorito salvo com sucesso'
        ];
        Transaction::close();
    } catch (Exception $e) {
      $retorno  = [
        'status' => 0,
        'msg' => 'Não foi possivel salvar, tente novamente !'
      ];
    }
  }else{
    $retorno = [
      'status' => 0,
      'msg' => 'Este <b>Filme</b> já esta na sua lista de favoritos !'
    ];
  }

$this->view->jsonEncode($retorno);
}

function salvaAtor(){
  $verificador = $this->model->verificaAtorFavorito($_POST['id'], $_SESSION[SESSION_LOGIN]->usu_id);

  if(empty($verificador) || (int)$verificador == 0){
    $dados = [
      'ator_imdb_id' => $_POST['id'],
      'ator_nome' => $_POST['nome'],
      'ator_participacao' => $_POST['participacao'],
      'ator_foto'=> $_POST['foto'],
      'ator_usuario_id' => $_SESSION[SESSION_LOGIN]->usu_id
    ];

    try {
        $this->model->salvaAtorFavorito($dados);
        $retorno  = [
          'status' => 1,
          'msg' => 'Favorito salvo com sucesso'
        ];
        Transaction::close();
    } catch (Exception $e) {
      $retorno  = [
        'status' => 0,
        'msg' => 'Não foi possivel salvar, tente novamente !'
      ];
    }
  }else{
    $retorno = [
      'status' => 0,
      'msg' => 'Este <b>Ator</b> já esta na sua lista de favoritos !'
    ];
  }

$this->view->jsonEncode($retorno);

}

function removeFavoritos(){
  $tabela = $_POST['tabela'];
  $id = $_POST['id'];

  if(!empty($tabela)){
    try {
      $this->model->deleteFavorito($tabela, $id);
      Transaction::close();

      $retorno = [
        'status' => 1,
        'msg' => 'Favorito excluído com sucesso !'
      ];
    } catch (Exception $e) {
      $retorno = [
        'status' => 1,
        'msg' => 'Não foi possivel excluir, tente novamente'
      ];
    }
  }
  $this->view->jsonEncode($retorno);
}

function recomendaFilmesByAtor($atorFavorito){
  require_once 'library/IMDb.php';
  $imdb = new IMDb();

  $quantidade = count($atorFavorito);

  for ($i=0; $i < $quantidade; $i++) {
    $filmeRecomendado[$i] = $imdb->find_by_title($atorFavorito[$i]->ator_nome);

    if($filmeRecomendado[$i]['response'] == 1){
      unset($filmeRecomendado[$i]['response']);
      unset($filmeRecomendado[$i]['response_msg']);
    }
  }
  return $filmeRecomendado;
}

//Fecha Controller
  }
