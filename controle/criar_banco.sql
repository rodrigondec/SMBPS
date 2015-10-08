drop database d77afd63eaba34a8b9811a269b7f4b3fd;
create database d77afd63eaba34a8b9811a269b7f4b3fd;
USE d77afd63eaba34a8b9811a269b7f4b3fd;

drop database oxe;
create database oxe;
USE oxe;

drop table admins;
drop table times;
drop table jogadores;
drop table capitaes;

CREATE TABLE admins(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	login varchar(30) NOT NULL,
	senha varchar(32) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (login)
);

insert into admins (nome, login, senha) values ('rodrigo', 'rodrigondec', md5('3c1a0l1a0n6g0o'));
insert into admins (nome, login, senha) values ('Admin', 'admin', md5('oxente84'));

CREATE TABLE capitaes(
	id int NOT NULL auto_increment,
	sigla varchar(4) NOT NULL,
	cidade varchar(35) NOT NULL,
	nome varchar(35) NOT NULL,
	login varchar(30) NOT NULL,
	senha varchar(32) NOT NULL,
	nick varchar(35) NOT NULL,
	telefone varchar(14) NOT NULL,
	cpf varchar(14) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nick),
	UNIQUE (cpf),
	UNIQUE (login)
);

CREATE TABLE jogadores(
	id int NOT NULL auto_increment,
	sigla varchar(4) NOT NULL,
	cidade varchar(35) NOT NULL,
	nome varchar(35) NOT NULL,
	nick varchar(35) NOT NULL,
	cpf varchar(14) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nick),
	UNIQUE (cpf)
);

CREATE TABLE times(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	sigla varchar(4) NOT NULL,
	posicao int NOT NULL,
	pago boolean NOT NULL,
	id_capitao int,
	id_integrante_2 int,
	id_integrante_3 int,
	id_integrante_4 int,
	id_integrante_5 int,
	id_reserva int,
	PRIMARY KEY (id),
	UNIQUE (nome),
	UNIQUE (sigla),
	FOREIGN KEY (id_capitao) REFERENCES capitaes(id),
	FOREIGN KEY (id_integrante_2) REFERENCES jogadores(id),
	FOREIGN KEY (id_integrante_3) REFERENCES jogadores(id),
	FOREIGN KEY (id_integrante_4) REFERENCES jogadores(id),
	FOREIGN KEY (id_integrante_5) REFERENCES jogadores(id),
	FOREIGN KEY (id_reserva) REFERENCES jogadores(id) ON DELETE SET NULL
);