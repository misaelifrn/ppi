<?php

    class Database {

        private $host = "sql302.infinityfree.com";
        private $username = "if0_43445983";
        private $senha = "1YNCyCHLiiA4OB";
        private $banco = "if0_43445983_sistemaMvc";

        public $conn = '';

        public function conectar() {
            $this->conn = new mysqli($this->host, $this->username, $this->senha, $this->banco);

            if($this->conn->connect_error){
                die("Deu erro na conexão do banco".$this->conn->connect_error);
            }

            return $this->conn;
        }

    }

?>