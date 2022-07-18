## Programador PHP Junior - CRUD de Produtos
---
                Tecnologias Utilizadas  

- IDE:[ Visual studio Code](https://code.visualstudio.com/).
- SGBD: [ MySQL Workbench](https://dev.mysql.com/downloads/workbench/).
---
        Versões

- PHP v7.4.6, a 8 funciona mas pode gerar bugs.

---
        Instalação

- Faça o donwload do arquivo do projeto 
---

- Configurar a conexão do banco de dados no arquivo conexao.php no caminho db/conexao.php
- preencher os campos $user e $pass para estabelecer a conexão

<p align="center"><a href="#"><img src="public/img/conexao_bd.png" width="400"></a></p>

---

        Criação do banco de dados e tabelas

- Dentro da pasta aplicação tem um arquivo 'titan_db' que contem os comando para a a criação do banco de dados e suas respequitivas tabelas.

- Vamos lá, execute os comando na ordem que é mostrado para evitar possiveis erros, sentido cima -> baixo.

<p align="center"><a href="#"><img src="public/img/comando_bd.png" width="400"></a></p>

- Após execultar os comando e não ocorrer erros, podemos continuar, segue o exemplo da imagem a baixo. 

<p align="center"><a href="#"><img src="public/img/comando_bd.png" width="400"></a></p>

- Vejamos só, todos os comando foram execultados com sucesso.

<p align="center"><a href="#"><img src="public/img/confirmacao_comando_bd.png" width="400"></a></p>

        Vamos subir nosso servidor PHP

- Execulte o seguinte comando no seu terminal e no diretorio do projeto: "php -S localhost:8080/views" pois ele já passa o caminho da rota da aplicação, se tudo ocorrer bem você terá o seguinte retorno.


<p align="center"><a href="#"><img src="public/img/terminal_servidor.png" width="400"></a></p>

- Clique em cima do link precionando a tecla Ctrl que ira abrir a aplicação em seu navegador.

---

        Aplicação - Telas

- Tela de Cadastro de Produto
<p align="center"><a href="#"><img src="public/img/tela_novo_produto.png" width="400"></a></p>

- Os campos tem validação e mensagem de retorno sobre os campos não preenchidos.
- Ao enviar um formulario que você acabe se esquecendo de preencher algum campos, não será necessario preenche-los novamente, pois os inputs receberam o seu estado anterior.

- Retorno se o produto foi inserido com sucesso.
<p align="center"><a href="#"><img src="public/img/msg_produto_inserido_sucesso.png" width="400"></a></p>

---

- Tela Todos Produtos
<p align="center"><a href="#"><img src="public/img/tela_todos_produto.png" width="400"></a></p>
- Na tela Todos os produtos voce pode ver os produtos cadastrados e seus descontos de acordo com as regras de negocios, excluir e editar produtos.

- Edicão de produto
<p align="center"><a href="#"><img src="public/img/tela_todos_produto.png" width="400"></a></p>

- Editar Produtos
<p align="center"><a href="#"><img src="public/img/edicao_produto.png" width="400"></a></p>

- Produto Editado
<p align="center"><a href="#"><img src="public/img/edicao_produto_finalizada.png" width="400"></a></p>
- O desconto do produto é atualizado com suas respectivas regras.

- Exclusão
<p align="center"><a href="#"><img src="public/img/exclusao_produto.png" width="400"></a></p>
-O produto de ID um foi excluido

---


- Tela filtros Produtos
<p align="center"><a href="#"><img src="public/img/filtros_produtos.png" width="400"></a></p>

- O retorno dos produtos acaba sendo de uma forma simples, contudo é funcional. 

<p align="center"><a href="#"><img src="public/img/filtro_maiorque.png" width="400"></a></p>

- Na Imagem estamos utilizando o filtro do select Maior que '1000'. 
<p align="center"><a href="#"><img src="public/img/resultado.png" width="400"></a></p>

- se tivesse mais produtos maior que 1000 iria ser recuperado tambem.

---
                ISSO É TUDO PESSOAL
---