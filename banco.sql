drop DATABASE if exists RajTecnologia;
create DATABASE RajTecnologia;
use RajTecnologia;
CREATE TABLE usuario(
	cpf_cnpj varchar(30) NOT NULL,
	nome varchar(30) NOT NULL,
	telefone varchar(30),
	cidade varchar(30) NOT NULL,
	estado varchar(30) NOT NULL,
	email varchar(30) NOT NULL,
	informacoes varchar(200),
	tipo varchar(10) NOT NULL,
	PRIMARY KEY (cpf_cnpj)
);
INSERT INTO usuario(cpf_cnpj,nome,telefone,cidade,estado,email,informacoes,tipo) 
	VALUES('418.345.960-50','Maria','(81)98525-1292','Igarassu','Pernambuco','maria@hotmail.com','Sou Feliz', 'fisico');
INSERT INTO usuario(cpf_cnpj,nome,telefone,cidade,estado,email,informacoes,tipo) 
	VALUES('817.466.600-15','Bruno','(81)98759-9212','Abreu e Lima','Pernambuco','bruno@hotmail.com','Sou Triste', 'fisico');
INSERT INTO usuario(cpf_cnpj,nome,telefone,cidade,estado,email,informacoes,tipo) 
	VALUES('793.122.980-03','Sofia Engenharia','(81)98359-6599','Recife','Pernambuco','sofia@engenharia.com','Empresa que se importa com o cliente', 'juridico');