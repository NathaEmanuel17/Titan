<?php
    class Produto {
        private $id;
        private $produto;
        private $cor;
        private $preco;

        public function __get($atributo) {
            return $this->$atributo;
        }
    
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
        }
    }
?>
