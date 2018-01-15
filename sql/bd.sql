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

