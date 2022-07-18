<?php
    require "./model/produto.model.php";
    require "./db/produto.service.php";
    require "./db/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : $acao;

    
    
    if($acao == 'create') {
        foreach ($_POST as $key => $value){
            if (empty($value)){
                header('Location: ../views/index.php?campo='.$key.'&nome='.$_POST['nome'].'&preco='.$_POST['preco'].'&cor='.$_POST['cor']);
                echo "<p>Campo ".$key." em branco</p>";
                exit;   
            }
        }
        
        $produto = new Produto();
        $produto->__set('nome', $_POST['nome'])
                ->__set('cor', $_POST['cor'])
                ->__set('preco', $_POST['preco']);
                
        $conexao = new Conexao();
        $produtoService = new ProdutoService($conexao, $produto);   
        $produtoService->create();

        header('Location: ../views/read.php?inclusao=1');
    } else if($acao == 'read') {
        $produto = new Produto();
        $conexao = new Conexao();

        $produtoService = new ProdutoService($conexao, $produto);   
        $produtos = $produtoService->read();

        
        foreach($produtos as $indice => $produto) {
            $desconto[$indice] = $produto->preco;
            
            
            if ($produto->cor == 'vermelho' && $produto->preco > 50) {   
                $produtoDesconto = $produto->preco - ($produto->preco * 0.05);
                $desconto[$produto->idprod] = $produtoDesconto;
                $produtos['desconto'] = $desconto;

            } else if($produto->cor == 'amarelo') {

                $produtoDesconto = $produto->preco - ($produto->preco * 0.1);
                $desconto[$produto->idprod] = $produtoDesconto;
                $produtos['desconto'] = $desconto;

            } else  if($produto->cor == 'azul' || $produto->cor == 'vermelho'){

                $produtoDesconto = $produto->preco - ($produto->preco * 0.2);
                $desconto[$produto->idprod] = $produtoDesconto;
                $produtos['desconto'] = $desconto;

            } 
            
        }
        

    } else if($acao == 'update'){
        $produto = new Produto();
        $produto->__set('nome',$_POST['nome'])
                ->__set('preco',$_POST['preco'])
                ->__set('cor',$_POST['cor'])
                ->__set('idprod',$_POST['idprod']);
        $conexao = new Conexao();

        $produtoService = new ProdutoService($conexao, $produto);   
        $produtos = $produtoService->update();
        
        header('Location: ../views/read.php');

    }else if($acao == 'delete') {
        $produto = new Produto();
        $produto->__set('idprod', $_GET['idprod'])
                ->__set('idpreco', $_GET['idpreco']);

        $conexao = new Conexao();

        $produtoService = new ProdutoService($conexao, $produto);   
        $produtoService->delete();

        header('Location: ../views/read.php');
    } else if($acao == 'consulta') {

        foreach ($_POST as $key => $value){
            if (empty($value)){
                header('Location: ./views/select.php?campo='.$key.'&operador='.$_POST['nome']);
                echo "<p>Campo ".$key." em branco</p>";
                exit;   
            }
        }

        if($tipo == 'nome') {
            $produto = new Produto();
            $produto->__set('nome', $_POST['nome']);
            $conexao = new Conexao();
            
            $produtoService = new ProdutoService($conexao, $produto);   
            $produtos = $produtoService->readNome();

            foreach($produtos as $indice => $produto) {
                echo'<p>nome: '.$produto->nome.'</p>';
                echo'<p>preco: '.$produto->preco.'</p>';
                echo'<p>cor: '.$produto->cor.'</p>';
                echo'<p>id: '.$produto->idprod.'</p>';
                echo'<hr>';               
            }
            printf("<a href='%s' class='buttonLink'>VOLTAR</a><br>", '../views/select.php');
            
            //echo '<pre>';
            //var_dump($produtos);
        } else if($tipo == 'cor') {

            foreach ($_POST as $key => $value){
                if (empty($value)){
                    header('Location: ../views/select.php?campo='.$key.'&cor='.$_POST['cor']);
                    echo "<p>Campo ".$key." em branco</p>";
                    exit;   
                }
            }

            $produto = new Produto();
            $produto->__set('cor', $_POST['cor']);
            $conexao = new Conexao();
            $produtoService = new ProdutoService($conexao, $produto);   
            $produtos = $produtoService->readCor();
          
            foreach($produtos as $indice => $produto) {
                echo'<p>nome: '.$produto->nome.'</p>';
                echo'<p>preco: '.$produto->preco.'</p>';
                echo'<p>cor: '.$produto->cor.'</p>';
                echo'<p>id: '.$produto->idprod.'</p>';
                echo'<hr>';               
            }
            printf("<a href='%s' class='buttonLink'>VOLTAR</a><br>", '../views/select.php');
            

        } else if($tipo == 'operador') {

            foreach ($_POST as $key => $value){
                if (empty($value)){
                    header('Location: ../views/select.php?campo='.$key.'&operador='.$_POST['operador']);
                    echo "<p>Campo ".$key." em branco</p>";
                    exit;   
                }
            }

            $produto = new Produto();
            $produto->__set('operador', $_POST['operador'])
                    ->__set('preco', $_POST['preco']);
            $conexao = new Conexao();
            $produtoService = new ProdutoService($conexao, $produto);   
            $produtos = $produtoService->readPreco();

            foreach($produtos as $indice => $produto) {
                echo'<p>nome: '.$produto->nome.'</p>';
                echo'<p>preco: '.$produto->preco.'</p>';
                echo'<p>cor: '.$produto->cor.'</p>';
                echo'<p>id: '.$produto->idprod.'</p>';
                echo'<hr>';               
            }
            printf("<a href='%s' class='buttonLink'>VOLTAR</a><br>", '../views/select.php');
            

        }
        
    }
  
?>