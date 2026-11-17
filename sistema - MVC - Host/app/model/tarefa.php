<?php

    require_once __DIR__.'/../config/database.php';

    class Tarefa {
        private $conn;

        public function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        # Listar

        public function listar($id_usuario) {   
            $sql = "SELECT * FROM tarefas WHERE id_usuario = ? ORDER BY data_criacao DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id_usuario);
            $stmt->execute();

            $resultado = $stmt->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);

            // $tarefas = [];
            // $id = intval($id_usuario);
            // $sql = "SELECT * FROM tarefas WHERE id_usuario = '$id' ORDER BY data_criacao DESC";
            // $resultado = $this->conn->query($sql);

            // if($resultado->num_rows > 0) {
            //     while($row = $resultado->fetch_assoc()) {
            //         $tarefas[] = $row;
            //     }
            // }

            // return $tarefas;
        }

        # Criar

        public function criar($id_usuario, $descricao) {
            $sql = "INSERT INTO tarefas (id_usuario, descricao) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("is", $id_usuario, $descricao);
            return $stmt->execute();

            // $id = intval($id_usuario);
            // $descricao = $this->conn->real_escape_string($descricao);
            // $sql = "INSERT INTO tarefas (id_usuario, descricao) VALUES ('$id', '$descricao')";
            
            // return $this->conn->query($sql);
        }

        # Excluir

        public function excluir($id_tarefa, $id_usuario) {
            $sql = "DELETE FROM tarefas WHERE id_tarefa = ? AND id_usuario = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $id_tarefa, $id_usuario);
            return $stmt->execute();

            // $id_tarefa = intval($id_tarefa);
            // $id_usuario = intval($id_usuario);
            // $sql = "DELETE FROM tarefas WHERE id_tarefa = $id_tarefa AND id_usuario = $id_usuario";
            // return $this->conn->query($sql);
        }

        # Editar

        public function editar($id_tarefa, $id_usuario, $descricao) {
            $sql = "UPDATE tarefas SET descricao = ? WHERE id_tarefa = ? AND id_usuario = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sii", $descricao, $id_tarefa, $id_usuario);
            return $stmt->execute();

            // $id_tarefa = intval($id_tarefa);
            // $id_usuario = intval($id_usuario);
            // $descricao = $this->conn->real_escape_string($descricao);
            // $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id_tarefa = '$id_tarefa' AND id_usuario = '$id_usuario'";
            // return $this->conn->query($sql);
        }

    }

?>