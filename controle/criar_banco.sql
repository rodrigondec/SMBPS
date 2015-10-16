

drop database smbps;
create database smbps;
USE smbps;

CREATE TABLE hospital(
	id int NOT NULL auto_increment,
	sigla varchar(10) NOT NULL,
	nome varchar(35) NOT NULL,
	cnpj varchar(14) NOT NULL,
	telefone varchar(11) NOT NULL,
	regiao varchar(30) NOT NULL,
	estado varchar(30) NOT NULL,
	cidade varchar(30) NOT NULL,
	endereco varchar(40) NOT NULL,
	complemento varchar(20) NOT NULL,
	cep varchar(8) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (CNPJ)
);

CREATE TABLE papel(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nome)
);

CREATE TABLE usuario(
	id int NOT NULL auto_increment,
	id_papel int NOT NULL,
	id_hospital int,
	nome varchar(35) NOT NULL,
	email varchar(35) NOT NULL,
	senha varchar(32) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_papel) REFERENCES papel(id),
	FOREIGN KEY (id_hospital) REFERENCES hospital(id),
	UNIQUE (email)
);

CREATE TABLE formulario(
	id int NOT NULL auto_increment,
	id_hospital int NOT NULL,
	data_recebimento varchar(8) NOT NULL, 
	mes_avaliacao varchar(2) NOT NULL,
	nome_responsavel varchar(35) NOT NULL,
	email_responsavel varchar(35) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_hospital) REFERENCES hospital(id)
);

insert into hospital (sigla, nome, cnpj, telefone, endereco, complemento, cep) values ('HT', 'Hospital Teste', '11111111111111', '8432085798', 'R. Teste BLA BLA BLA', 'nº 200', '59152250');

insert into hospital (sigla, nome, cnpj, telefone, endereco, complemento, cep) values ('HT2', 'Hospital Teste2', '22222222222222', '8432085798', 'R. Teste BLA BLA BLA', 'nº 200', '59152250');

insert into papel (nome) values ('Administrador Geral'), ('Gestor Hospitalar');

insert into usuario (nome, email, senha, id_papel, id_hospital) values ('rodrigo', 'rodrigondec@gmail.com', md5('3c1a0l1a0n6g0o'), 1, NULL), ('gestor', 'gestor@hospital.com', md5('gestor'), 2, 1);

insert into formulario (id_hospital, data_recebimento, mes_avaliacao, nome_responsavel, email_responsavel) values (1, '15102015', '10', 'jhon', 'jhon@hospital.com');

insert into formulario (id_hospital, data_recebimento, mes_avaliacao, nome_responsavel, email_responsavel) values (2, '15102015', '10', 'jhon', 'jhon@hospital.com');

