<?php
$acao = 'consulta';

//require '../controller/produto_controller.php';

?>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Cadastra Produto</title>

    <link rel="stylesheet" href="../public/css/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../public/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                App Lista Produto
            </a>
        </div>
    </nav>

    <div class="container app">
        <div class="row">
            <div class="col-sm-3 menu">
                <ul class="list-group">
                    <li class="list-group-item"><a href="../views/index">Nova Produto</a></li>
                    <li class="list-group-item"><a href="../views/read.php">Todos Produtos</a></li>
                    <li class="list-group-item active"><a href="#">Consultar Produtos</a></li>
                </ul>
            </div>

            <div class="col-sm-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Consultar Produto(s)</h4>
                        </div>
                    </div>
                    <form method="post" class="" action="../controller/produto_controller.php?acao=consulta&tipo=nome">
                        <div class="form-group row ">
                            <div class="col-6">
                                <label>Nome Produto</label>
                                <input name="nome" type="text" class="form-control" placeholder="Nome:">
                                <?php if (isset($_GET['campo']) && $_GET['campo'] == 'nome') { ?>
                                Informe o Nome
                                <?php } ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Consultar</button>
                    </form>
                    <hr>
                    <form method="post" class="" action="../controller/produto_controller.php?acao=consulta&tipo=cor">
                        <div class="form-group row ">
                            <div class="col-6">
                                <label>Selecione a cor do Produto</label>
                                <select class="form-control" name="cor" id="">
                                    <option></option>
                                    <option value="azul">Azul</option>
                                    <option value="amarelo">Amarelo</option>
                                    <option value="vermelho">Vermelho</option>
                                </select>
                                <?php if (isset($_GET['campo']) && $_GET['campo'] == 'cor') { ?>
                                Informe a cor
                                <?php } ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Consultar</button>
                    </form>
                    <hr>
                    <form method="post" class="" action="../controller/produto_controller.php?acao=consulta&tipo=operador">
                        <div class="form-group row ">
                            <div class="col-6">
                                <label>Tipo da consulta</label>
                                <select class="form-control" name="operador" id="">
                                    <option value="<?=$_GET['operador']?>"><?=$_GET['operador']?></option>
                                    <option value=">">Maior que</option>
                                    <option value="<">Menor que</option>
                                    <option value="=">Igual a</option>
                                </select>
                                <?php if (isset($_GET['campo']) && $_GET['campo'] == 'operador') { ?>
                                Informe o Operador para o filtro
                                <?php } ?>
                            </div>
                            <div class="col-6">
                                <label>Preco Produto</label>
                                <input name="preco" value="<?=$_GET['preco']?>" type="number"
                                    pattern="[0-9]+([,\.][0-9]+)?" step="any" class="form-control" placeholder="Preço:">
                                <?php if (isset($_GET['campo']) && $_GET['campo'] == 'preco') { ?>
                                Informe o valor
                                <?php } ?>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">Consultar</button>
                    </form>

                    <div class="col-sm-9">
                        <div class="container pagina">
                            <div class="row">
                                <div class="col">
                                    <h4>Todos Produtos</h4>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>