<?php
$acao = 'read';
require './controller/produto_controller.php';

//var_dump($produtos);
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

    <script type="text/javascript" src="../public/js/funcoes.js"></script>
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

    <?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
    <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Produto inserido com sucesso!</h5>
    </div>
    <?php } ?>



    <div class="container app">
        <div class="row">
            <div class="col-sm-2 menu">
                <ul class="list-group">
                    <li class="list-group-item"><a href="../views/index.php">Novo Produto</a></li>
                    <li class="list-group-item active"><a href="#">Todos Produtos</a></li>
                    <li class="list-group-item"><a href="../views/select.php">Consultar Produtos</a></li>
                </ul>
            </div>

            <div class="col-sm-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Todos Produtos</h4>
                            <hr />
                            <?php foreach ($produtos as $indice => $produto) { ?>
                            <?php if(isset($produto->idprod)) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Preço</th>
                                        <th scope="col">Preço com Desconto</th>
                                        <th scope="col">Cor</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td scope="row"><?= $produto->idprod ?></td>
                                        <td><?= $produto->nome ?></td>
                                        <td><?= "R$: ".number_format( $produto->preco, 2, "," , "." ) ?></td>
                                        <td><?= "R$: ".number_format( $produtos['desconto'][$produto->idprod], 2, "," , "." )?>
                                        </td>
                                        <td><?= $produto->cor ?></td>
                                    </tr>
                                </tbody>

                            </table>

                            <div class="col-sm-2 mt-2 d-flex justify-content-between">
                                <i class="fas fa-trash-alt fa-lg text-danger"
                                    onclick="remover(<?= $produto->idprod ?>, <?= $produto->idpreco ?>)"></i>
                                <i class="fas fa-edit fa-lg text-info"
                                    onclick="editar(<?= $produto->idprod ?>, '<?= $produto->nome ?>', <?= $produto->preco ?>, '<?= $produto->cor ?>')"></i>
                            </div><br />


                            <div class="row mb-3 d-flex align-items-center produto">
                                <div class="col-sm-9" id="produto_<?= $produto->idprod ?>">

                                </div>
                            </div>
                            <?php } ?>

                            <?php } ?>
                        </div>

                    </div>

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