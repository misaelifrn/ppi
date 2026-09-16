<?php

    class Conexao {

        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $banco = "mercado3";

        public $conexao;

        public function conectar() {
            $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
            
            if ($this->conexao->connect_error === TRUE) {
                die("Erro ao conectar!".$this->conexao->connect_error);
            }
        }

    }

?>