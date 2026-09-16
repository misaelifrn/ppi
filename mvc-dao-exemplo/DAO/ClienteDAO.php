<?php

    include("../config/Conexao.php");

    class ClienteDAO {

        private $con;

        public function __construct() {
            $this->con = new Conexao;
            $this->con->conectar();
        }

        public function cadastrar($clie) {
            $sql = "INSERT INTO cliente3 VALUES ('".$clie->getId()."', '".$clie->getNome()."', '".$clie->getIdade()."')";
            $this->executarSQL($sql);
        }

        public function atualisar($clie) {
            $sql = "UPDATE cliente3 SET nome = '".$clie->getNome()."', idade = '".$clie->getIdade()."' WHERE id = '".$clie->getId()."'";
            $this->executarSQL($sql);
        }

        public function remover($id) {
            $sql = "DELETE FROM cliente3 WHERE id = '$id'";
            $this->executarSQL($sql);
        }

        public function consultar() {
            $sql = "SELECT * FROM cliente3";
            $resultado = $this->con->conexao->query($sql);

            if ($resultado && $resultado->num_rows > 0) {
                echo "
                    <style>
                        table {
                            border-collapse: collapse;
                        }
    
                        table tr th, table tr td {
                            border: 1px solid black;
                        }
    
                        table tr th {
                            width: 20%;
                        }
                    </style>
    
                    <table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Idade</th>
                        </tr>
                ";
    
                while ($dados = $resultado->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>".$dados['id']."</td>
                            <td>".$dados['nome']."</td>
                            <td>".$dados['idade']."</td>
                        </tr>
                    ";
                }
    
                echo "</table";
            } else {
                echo "<h1>Não há nenhum cliente cadastrado!</h1>";
            }
        }

        public function executarSQL($sql) {
            if ($this->con->conexao->query($sql)) {
                echo "Executou!";
            } else {
                echo "Não executou!";
            }
        }

    }

?>