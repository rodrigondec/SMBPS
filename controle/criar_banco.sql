drop database d77afd63eaba34a8b9811a269b7f4b3fd;
create database d77afd63eaba34a8b9811a269b7f4b3fd;
USE d77afd63eaba34a8b9811a269b7f4b3fd;

drop database smbps;
create database smbps;
USE smbps;

CREATE TABLE papel(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nome)
);

CREATE TABLE usuario(
	id int NOT NULL auto_increment,
	id_papel int NOT NULL,
	nome varchar(35) NOT NULL,
	email varchar(35) NOT NULL,
	senha varchar(32) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_papel) REFERENCES papel(id),
	UNIQUE (email)
);

insert into papel (id, nome) values (1, 'Administrador Geral');

insert into usuario (nome, email, senha, id_papel) values ('rodrigo', 'rodrigondec@gmail.com', md5('3c1a0l1a0n6g0o'), 1);

CREATE TABLE hospital(
	id int NOT NULL auto_increment,
	sigla varchar(10) NOT NULL,
	nome varchar(35) NOT NULL,
	cnpj varchar(14) NOT NULL,
	telefone varchar(14) NOT NULL,
	endereço varchar(40) NOT NULL,
	cep varchar(9) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE formulario(
	id int NOT NULL auto_increment,
	id_hosp int NOT NULL,
	data_preenchimento varchar (10) NOT NULL, 
	mes_avaliacao varchar (10) NOT NULL,
	nome_responsavel varchar (35) NOT NULL,
	email_responsavel varchar (35) NOT NULL,




	PRIMARY KEY (id),
	FOREIGN KEY (id_hosp) REFERENCES hospital(id)
);
