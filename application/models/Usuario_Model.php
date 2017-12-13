<?php

class Usuario_Model extends Model {

function getAllusers(){
  $sql = "SELECT * FROM usuario";

  return $this->db->select($sql);
}

function getAtoresFavoritos($id) {
  $sql = "SELECT * FROM ator_favorito WHERE ator_usuario_id = {$id}";
  return $this->db->select($sql);
}

function getNomeAtorFavorito($id){
  $sql = "SELECT ator_nome FROM ator_favorito WHERE ator_usuario_id = {$id}";
  return $this->db->select($sql);
}


function getFilmesFavoritos($id) {
  $sql = "SELECT * FROM filme_favorito WHERE filme_usuario_id = {$id}";
  return $this->db->select($sql);
}

function verificaFilmeFavorito($filme_id, $usu_id){
  $sql = "SELECT * FROM filme_favorito WHERE filme_imdb_id = '{$filme_id}' AND filme_usuario_id = {$usu_id}";
  return $this->db->select($sql);
}

function verificaAtorFavorito($ator_id, $usu_id){
  $sql = "SELECT * FROM ator_favorito WHERE ator_imdb_id = '{$ator_id}' AND ator_usuario_id = {$usu_id}";
  return $this->db->select($sql);
}

function salvaFilmeFavorito($dados){
  $this->db->insert('filme_favorito', $dados);
}

function salvaAtorFavorito($dados){
  $this->db->insert('ator_favorito', $dados);
}

function deleteFavorito($tabela, $id){
  if($tabela === "ator_favorito"){
  $sql = "DELETE FROM {$tabela} WHERE ator_id = '{$id}'";
  }
  if($tabela === "filme_favorito"){
  $sql = "DELETE FROM {$tabela} WHERE filme_id = '{$id}'";
  }
return $this->db->_query($sql);
}

//Fecha Model
}
