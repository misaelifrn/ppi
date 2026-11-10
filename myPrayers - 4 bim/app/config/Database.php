<?php 

    class Database {

        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "myPrayers";

        public $conn = "";

        public function conectar() {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

            if ($this->conn->connect_error) {
                die ("Erro ao conectar com o banco de dados: ".$this->conn->connect_error);
            }

            return $this->conn;
        }

    }

?>