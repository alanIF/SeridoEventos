SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
create database seridoeventos;
use seridoeventos;

create table usuario(
	id int auto_increment not null,
	nome varchar(200) not null,
	email varchar(200) not null,
	senha varchar(200) not null,
	instituicao varchar(200) not null,
	validacao int,
	isAdmin int,
	primary key(id)
);
/*
	campo validacao para verficamos manualmente se o usuario é daquela instituição,
	0- Nao Validado ainda, nao tem acesso
	1- Validado, tem acesso e pode cadastrar seus eventos

*/
create table evento (
  id int  not null auto_increment,
  id_usuario int not null,
  titulo text not null,
  descricao text not null,
  link_inscricao text not null,
  local_evento text not null,
  curso text not null,
  cor varchar(220) not null,
  inicio_evento datetime not null,
  fim_evento datetime not null,
  primary key(id),
  foreign key(id_usuario) references usuario(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*
Tabela destinada a localização Google Maps
*/

CREATE TABLE `markers` (
  `id` INT NOT NULL PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL ,
  `type` VARCHAR( 30 ) NOT NULL
) ENGINE = MYISAM ;
