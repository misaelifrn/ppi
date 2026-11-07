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
            $tarefas = [];
            $id = intval($id_usuario);
            $sql = "SELECT * FROM tarefas WHERE id_usuario = '$id' ORDER BY data_criacao DESC";
            $resultado = $this->conn->query($sql);

            if($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    $tarefas[] = $row;
                }
            }

            return $tarefas;
        }

        # Criar

        public function criar($id_usuario, $descricao) {
            $id = intval($id_usuario);
            $descricao = $this->conn->real_escape_string($descricao);
            $sql = "INSERT INTO tarefas (id_usuario, descricao) VALUES ('$id', '$descricao')";
            
            return $this->conn->query($sql);
        }

        # Excluir

        public function excluir($id_tarefa, $id_usuario) {
            $id_tarefa = intval($id_tarefa);
            $id_usuario = intval($id_usuario);
            $sql = "DELETE FROM tarefas WHERE id_tarefa = $id_tarefa AND id_usuario = $id_usuario";
            return $this->conn->query($sql);
        }

        # Editar

        public function editar($id_tarefa, $id_usuario, $descricao) {
            $id_tarefa = intval($id_tarefa);
            $id_usuario = intval($id_usuario);
            $descricao = $this->conn->real_escape_string($descricao);
            $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id_tarefa = '$id_tarefa' AND id_usuario = '$id_usuario'";
            return $this->conn->query($sql);
        }

    }

?>