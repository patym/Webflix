<?php
/*
* MySQL
* Comandos a serem executados no cliente de banco de dados para criar as tabelas.

* Cria a tabela de usuários
****************************

CREATE TABLE webflix.usuario (
    usu_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usu_nome varchar(100) NULL,
    usu_email varchar(100) NULL,
    usu_senha varchar(100) NULL,
    usu_tipo INT NULL,
    usu_status INT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci ;

*****************************
 Cria a tabela de atores favoritos
****************************

CREATE TABLE webflix.ator_favorito (
    ator_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ator_nome varchar(100) NULL,
    ator_participacao varchar(100) NULL,
    ator_foto varchar(200) NULL,
    ator_usuario_id int(2) NULL,
    ator_imdb_id int(20) NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci ;

*****************************
 Cria a tabela de filmes favoritos
****************************

CREATE TABLE webflix.filme_favorito (
    filme_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filme_titulo varchar(100) NULL,
    filme_ano varchar(4) NULL,
    filme_atores varchar(100) NULL,
    filme_capa varchar(200) NULL,
    filme_usuario_id int(2) NULL,
    filme_imdb_id int(20) NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci ;

*****************************
*/
