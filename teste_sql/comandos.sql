use titan_teste;

insert into tb_produto(cod_prod, loj_prod, desc_prod, dt_inclu_prod, preco_prod) values(170, 2, 'LEITE CONDENSADO MOCOCA', '2010-12-30', 45.4);

update tb_produto set preco_prod = 95.40 where cod_prod = 170 and loj_prod = 2;

select * from tb_produto where loj_prod = 1 or 2 order by loj_prod asc;
select date_format(min(dt_inclu_prod),'%d/%m/%Y') as data_minima, 
	   date_format(max(dt_inclu_prod), '%d/%m/%Y') as data_maxima 	
       from tb_produto;
select count(cod_prod) as total_prod from tb_produto;

select * from tb_produto where desc_prod like 'L%';

select loj_prod as codigo_loja, sum(preco_prod) as total_valor from tb_produto group by loj_prod;

select loj_prod as codigo_loja, sum(preco_prod) as valor_total where preco_prod > 100.00 group by loj_prod;

select tb_produto.loj_prod as codigo_loja,
	   tb_loja.desc_loj as descricao_loja,
       tb_produto.cod_prod as codigo_produto,
       tb_produto.desc_prod as descricao_produto,
       tb_estoque.qtd_prod as quantidade_produto
       from tb_produto
       left join tb_loja
       on tb_produto.loj_prod = tb_loja.loj_prod
       left join tb_estoque
       on tb_produto.cod_prod = tb_estoque.cod_prod
       where tb_produto.loj_prod = 1;
       
select * from tb_produto
	left join tb_estoque
    on tb_produto.cod_prod = tb_estoque.cod_prod
    where tb_estoque.cod_prod is not null
    order by tb_produto.loj_prod asc;

select * from tb_estoque
	left join tb_produto
    on tb_produto.cod_prod = tb_estoque.cod_prod
    where tb_produto.cod_prod is null;
    

