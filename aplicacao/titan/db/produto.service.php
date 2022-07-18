<?php
    //crud

    class ProdutoService {
        private $conexao;
        private $produto;

        public function __construct(Conexao $conexao, Produto $produto) {
            $this->conexao = $conexao->conectar();
            $this->produto = $produto;
        } 
    
        public function create() {
            $query = 
                        'start transaction;
                            insert into produto(nome, cor)values(:nome, :cor);
                            insert into preco(preco)values(:preco);
                        commit;
                        '
                        
                        ;
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->produto->__get('nome'));
            $stmt->bindValue(':cor', $this->produto->__get('cor'));
            $stmt->bindValue(':preco', $this->produto->__get('preco'));

            return $stmt->execute();
        }

        public function read() {
            $query = 'select produto.nome, produto.cor, preco.preco, produto.idprod, preco.idpreco
            from produto
            inner join preco
            on produto.idprod
            where produto.idprod = preco.idpreco';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function update() {
            $query = "
                update produto p
                inner join preco pa on p.idprod = pa.idpreco
                set p.nome = :nome, p.cor = :cor, pa.preco = :preco
                where p.idprod = :idprod;
            ";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->produto->__get('nome'));
            $stmt->bindValue(':cor', $this->produto->__get('cor'));
            $stmt->bindValue(':preco', $this->produto->__get('preco'));
            $stmt->bindValue(':idprod', $this->produto->__get('idprod')); 

            $stmt->execute();
        }

        public function delete() {
            $query = 
            "start transaction;
                delete from preco where idpreco = :idpreco;
                delete from produto where idprod = :idprod;
            commit; 
            ";

            $stmt = $this->conexao->prepare($query);  
            $stmt->bindValue(':idpreco', $this->produto->__get('idpreco'));
            $stmt->bindValue(':idprod', $this->produto->__get('idprod')); 
		    $stmt->execute();
        }

        public function readNome() {
            
            $query = 'select * from produto inner join preco where produto.nome = :nome and preco.idpreco = produto.idprod;';            
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->produto->__get('nome'));
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function readCor() {
            $query = 'select * from produto inner join preco where produto.cor = :cor and preco.idpreco = produto.idprod;';            
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':cor', $this->produto->__get('cor'));
            $stmt->execute();

            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function readPreco() {
            $operador = $this->produto->__get('operador');

            switch($operador) {
                case '>':
                    $query = 'select * from produto inner join preco where preco.preco > :preco and preco.idpreco = produto.idprod;';            
                    $stmt = $this->conexao->prepare($query);
                    $stmt->bindValue(':preco', $this->produto->__get('preco'));
                    
                    $stmt->execute();
    
                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                break;
                case '<':
                    $query = 'select * from produto inner join preco where preco.preco < :preco and preco.idpreco = produto.idprod;';            
                    $stmt = $this->conexao->prepare($query);
                    $stmt->bindValue(':preco', $this->produto->__get('preco'));
                    
                    $stmt->execute();
    
                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                break;
                case '=':
                    $query = 'select * from produto inner join preco where preco.preco = :preco and preco.idpreco = produto.idprod;';            
                    $stmt = $this->conexao->prepare($query);
                    $stmt->bindValue(':preco', $this->produto->__get('preco'));
                    
                    $stmt->execute();
    
                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                break;
            }
            
        }
    }
?>