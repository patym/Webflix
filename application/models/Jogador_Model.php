<?php
class Jogador_Model extends Model {

function getSenha($id){
  $SQL = "SELECT usu_senha FROM usuario WHERE usu_id = '{$id}'";
  return $this->db->select($SQL)[0];
}

function getUserByLogin($login){
  $SQL = "SELECT usu_login FROM usuario WHERE usu_login = '{$login}'";
  return $this->db->select($SQL);
}

/* função altera senha do usuário */
function alteraSenha($dados, $condicao){
  $this->db->update('usuario', $dados, $condicao);
}
/* função altera foto do usuário */
function alteraFoto($dados, $condicao){
  $this->db->update('usuario', $dados, $condicao);
}
/* função altera apelido do usuário */
function alteraNick($dados, $condicao){
  $this->db->update('usuario', $dados, $condicao);
}

function getCarisma($id){
  $SQL = "SELECT usu_carisma FROM usuario WHERE usu_id = '{$id}'";
  return $this->db->select($SQL)[0];
}

function getCarismaQnt($id){
  $SQL = "SELECT * FROM carisma WHERE car_usu_id = '{$id}'";
  return $this->db->select($SQL)[0];
}

function getOracao($id){
  $SQL = "SELECT * FROM templo WHERE tem_usu_id = '{$id}'";
  return $this->db->select($SQL);
}

function getConfig($id){
  $SQL = "SELECT * FROM config_usuario WHERE con_usu_id = '{$id}'";
  return $this->db->select($SQL)[0];
}

function updateConfig($dados, $condicao){
  $this->db->update('config_usuario', $dados, $condicao);
}

function updateCarisma($dados, $condicao){
  $this->db->update('carisma', $dados, $condicao);
}

function updateUsuario($dados, $condicao){
  $this->db->update('usuario', $dados, $condicao);
}

/* retorna todo conteudo da tabela taverna */
function getTaverna($status, $data){
  $SQL = "SELECT * FROM taverna WHERE tav_status = '{$status}' AND  tav_data BETWEEN '{$data}'' 00:00:00' AND '{$data}'' 23:59:59' ORDER BY tav_data DESC ";
  return $this->db->select($SQL);
}

/* retorna todas as postagens da tabela taverna de um unico usuário */
function buscaPostagens($login, $status){
  $SQL = "SELECT * FROM taverna WHERE tav_usu_login = '{$login}' AND tav_status = '{$status}' ORDER BY tav_data DESC";
  return $this->db->select($SQL);
}

function buscaPostagensDoDia($data, $status){
  $SQL = "SELECT * FROM taverna WHERE tav_status = '{$status}' AND  tav_data BETWEEN '{$data}'' 00:00:00' AND '{$data}'' 23:59:59' ORDER BY tav_data DESC ";
  return $this->db->select($SQL);
}

/* só faz insert / Só use esta função se souber o que esta fazendo ! */
function insert($tabela, $dados){
  $this->db->insert($tabela, $dados);
}
/* busca lista de salas favoritas do usuário */
function getFavoritos($id){
  $SQL = "SELECT * FROM favorita WHERE fav_usu_id = '{$id}'";
  return $this->db->select($SQL);
}

function deletaPostagemTaverna($id, $usuario){
  $SQL = "DELETE FROM taverna WHERE tav_id = '{$id}' AND tav_usu_id = '{$usuario}'";
  return $this->db->_query($SQL);
}

function deletaAcc($dados, $condicao){
  $this->db->update('usuario', $dados, $condicao);
}


//Fecha Model
}
