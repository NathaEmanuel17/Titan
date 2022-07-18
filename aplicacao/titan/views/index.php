<?php
require './controller/produto_controller.php';
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
            <div class="col-md-3 menu">
                <ul class="list-group">
                    <li class="list-group-item active"><a href="#">Nova Produto</a></li>
                    <li class="list-group-item"><a href="../views/read.php">Todos Produtos</a></li>
					<li class="list-group-item"><a href="../views/select.php">Consultar Produtos</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Novo Produto</h4>
                            <hr />

                            <form method="post" class="" action="../controller/produto_controller.php?acao=create">
                                <div class="form-group row ">
                                    <div class="col-6">
                                        <label>Nome Produto</label>
                                        <input name="nome" value="<?=$_GET['nome']?>" type="text" class="form-control"
                                            placeholder="Nome:">
                                        <?php if (isset($_GET['campo']) && $_GET['campo'] == 'nome') { ?>
                                        Digite o Nome
                                        <?php } ?>
                                    </div>

                                    <div class="col-2">
                                        <label>Preço Produto</label>
                                        <input name="preco" value="<?=$_GET['preco']?>" type="number"
                                            pattern="[0-9]+([,\.][0-9]+)?" step="any" class="form-control"
                                            placeholder="Preço:">
                                        <?php if (isset($_GET['campo']) && $_GET['campo'] == 'preco') { ?>
                                        Digite o Preço
                                        <?php } ?>
                                    </div>

                                    <div class="col-4">
                                        <label>Cor Produto</label>
                                        <select class="form-control" name="cor" id="">
                                            <option value="<?=$_GET['cor']?>"><?=$_GET['cor']?></option>
                                            <option value="azul">Azul</option>
                                            <option value="amarelo">Amarelo</option>
                                            <option value="vermelho">Vermelho</option>
                                        </select>
                                        <?php if (isset($_GET['campo']) && $_GET['campo'] == 'cor') { ?>
                                        Informe a cor
                                        <?php } ?>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>