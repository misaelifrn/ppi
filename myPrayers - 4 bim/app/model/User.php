<?php

    require_once __DIR__.'/../config/Database.php';

    class User {

        private $conn;

        public function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        // ------------- CRIPTOGRAFAR A SENHA -------------
        public function create($name, $email, $password) {
            $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $password);
            return $stmt->execute();
        }

        // ------------- ADMIN FUNCTION -------------
        public function read() {
            $sql = "SELECT id_user, name, email FROM user ORDER BY id_user ASC";
            $stmt = $this->conn->prepare($sql);
            // $stmt->bind_param();
            $stmt->execute();

            $resultado = $stmt->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function searchForEmail($email) {
            $sql = "SELECT * FROM user WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $resultado = $stmt->get_result();
            return $resultado->fetch_assoc();
        }

        // ------------- CRIPTOGRAFAR A SENHA -------------
        public function update($id_user, $name, $email, $password) {
            $sql = "UPDATE user SET name = ?, email = ?, password = ? WHERE id_user = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssi", $id_user, $name, $email, $password);
            return $stmt->execute();
        }

        // ------------- DELETAR AS ORAÇÕES DO USUÁRIO REFERIDO  -------------
        // public function delete($id_user) {
        //     $sql = "DELETE FROM user WHERE id_user = ?";
        //     $stmt = $this->conn->prepare($sql);
        //     $stmt->bind_param("i", $id_user);
            
        //     $sqlDeleteOracoes = "DELETE FROM oracao WHERE id_user = ?";
        //     $stmt2 = $this->conn->prepare($sqlDeleteOracoes);
        //     $stmt2->bind_param("i", $id_user);
        //     return $stmt->execute(), $stmt2->execute();

        // }

    }

?>