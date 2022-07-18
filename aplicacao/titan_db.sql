-- criação do bd
create database titan;
use titan;

-- criacao das tabelas
create table produto(
	idprod int not null primary key auto_increment,
    nome varchar(50), 
    cor varchar(10)
);

create table preco(
	idpreco int not null primary key auto_increment,
    preco float
);
alter table preco add constraint foreign key (idpreco) references produto(idprod);

ALTER TABLE preco AUTO_INCREMENT = 1;

ALTER TABLE produto AUTO_INCREMENT = 1;

