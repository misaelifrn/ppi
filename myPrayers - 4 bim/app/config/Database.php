<?php 

    class Database {

        private $localConfig = [
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'myPrayers'
        ];

        private $prodConfig = [
            'host' => 'sql302.infinityfree.com',
            'user' => 'if0_43445983',
            'password' => '1YNCyCHLiiA4OB',
            'database' => 'if0_43445983_sistemaMvc'
        ];


        // private $host = "localhost";
        // private $user = "root";
        // private $password = "";
        // private $database = "myPrayers";
        // $this->host, $this->user, $this->password, $this->database

        public $conn = "";

        public function conectar() {
            // $this->conn = new mysqli($this->localConfig->host, $this->localConfig->user, $this->localConfig->password, $this->localConfig->database);
            $this->conn = new mysqli($this->prodConfig->host, $this->prodConfig->user, $this->prodConfig->password, $this->prodConfig->database);

            if ($this->conn->connect_error) {
                die ("Erro ao conectar com o banco de dados: ".$this->conn->connect_error);
            }

            return $this->conn;
        }

    }

?>