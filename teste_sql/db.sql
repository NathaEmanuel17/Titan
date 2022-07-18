-- Criação do banco 
create database titan_teste;
use titan_teste;

-- Criação da tabala tb_loja
create table tb_loja (
	loj_prod int unsigned not null,
    desc_loj char(40) null,
    
    primary key (loj_prod)
);

-- Criação da tabala tb_produto
create table tb_produto (
	cod_prod int unsigned unique not null,
    loj_prod int unsigned not null,
    desc_prod char(40) null,
    dt_include_prod date null,
    preco_prod decimal(8, 3) null,
    
    primary key(cod_prod)
);
alter table tb_produto add foreign key(loj_prod) references tb_loja(loj_prod);

-- Criação da tabala tb_estoque
create table tb_estoque (
	cod_prod int unsigned unique not null,
    loj_prod int unsigned not null,
    qtd_prod decimal(15, 3)
);
alter table tb_estoque  add foreign key (cod_prod) references tb_produto(cod_prod);
alter table tb_estoque  add foreign key (loj_prod) references tb_loja(loj_prod);

-- insert
insert tb_loja (loj_prod, desc_loj)
values
   (1, 'CENTRO'),
   (2, 'ZONA LESTE'),
   (3, 'ZONA SUL');


insert tb_produto (cod_prod, loj_prod, desc_prod, dt_include_prod, preco_prod)
values
   (170, 2, 'LEITE CONDESADO MOCOCA', '2010-12-30', 45.40),
   (174, 2, 'PAO SOVADO', '2010-12-30', 7.99),
   (171, 2, 'SUCO DE LARANJA', '2010-12-29', 10.40),
   (130, 2, 'BOLINHO ANA MARIA', '2010-12-22', 1.50),
   (140, 2, 'LEITE DESNATADO', '2010-01-29', 5.40),
   
   
   (160, 1, 'BICICLETA', '2010-10-22', 1500.50),
   (109, 1, 'TV LED 40', '2010-08-23', 4500.00),
   (190, 1, 'VIDEO GAME NINTENDO', '2010-03-14', 1200.00),
   (110, 1, 'NOTEBOOK ASUS', '2010-02-16', 3500.99),
   (172, 1, 'CELULAR MOTOROLA', '2010-09-11', 650.00),
   
   
   (159, 3, 'SABONETE DOVE', '2010-02-14', 3.00),
   (153, 3, 'SHAMPOO ANTI-CASPA', '2010-03-07', 12.10),
   (133, 3, 'ESCOVA DE DENTE SUAVE', '2010-08-10', 3.20),
   (214, 3, 'PASTA DE DENTE COLGATE', '2010-05-15', 2.50),
   (178, 3, 'DESODORANTE AXE', '2010-04-24', 8.90);
   
insert tb_estoque (cod_prod, loj_prod, qtd_prod)
values
   (170, 2, 10.000),
   (174, 2, 5.000),
   (171, 2, 50.000),
   (178, 3, 100.000),
   (133, 3, 200.000),
   (214, 3, 150.000),
   (159, 3, 300.000),
   (153, 3, 60.000),
   (110, 1, 15.000),
   (190, 1, 5.000),
   (160, 1, 1.000),
   (109, 1, 1.000),
   (172, 1, 1.000),
   (130, 2, 150.000);