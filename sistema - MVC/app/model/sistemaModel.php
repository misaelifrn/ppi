<?php

    require_once __DIR__ . '/../config/database.php';

    class sistemaModel{
        private $conn;

        public function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        # Listar usuário por email

        public function buscarPorEmail($email){
            $sql = "SELECT * FROM usuarios WHERE email = ?";
             $stmt = $this->conn->prepare($sql);
             $stmt->bind_param("s", $email);
             $stmt->execute();
    
             $resultado = $stmt->get_result();
             return $resultado->fetch_assoc();
        }

        # Listar tarefa

        public function listar(){
            $tarefas = [];
            $sql = "SELECT * FROM tarefas ORDER BY data_criacao DESC";
            $resultado = $this->conn->query($sql);

            if($resultado->num_rows > 0){
                while($row = $resultado->fetch_assoc()){
                    $tarefas[] = $row;
                }
            }

            return $tarefas;
        }

        # Criar tarefa

        public function criar($descricao) {
            $descricao = $this->conn->real_escape_string($descricao);
            $sql = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";
            
            return $this->conn->query($sql);
        }

        # Excluir tarefa

        public function excluir($id){
            $id = intval($id);
            $sql = "DELETE FROM tarefas WHERE id = $id";
            return $this->conn->query($sql);
        }

        # Editar tarefa

        public function editar($descricao, $id){
            $descricao = $this->conn->real_escape_string($descricao);
            $id = intval($id);
            $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id = '$id'";
            return $this->conn->query($sql);
        }

    }

?>