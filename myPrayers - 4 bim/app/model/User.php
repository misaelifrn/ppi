<?php

    require_once __DIR__.'/../config/Database.php';

    class User {

        private $conn;

        public function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        public function create($name, $email, $password) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $passwordHash);

            if ($stmt->execute()) {
                return $this->conn->insert_id; // recupera o ID gerado pelo database
            }

            return false;
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
        public function update($id_user, $name, $email) {
            // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET name = ?, email = ? WHERE id_user = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssi", $name, $email, $id_user);
            return $stmt->execute();
        }

        // ------------- DELETAR AS ORAÇÕES DO USUÁRIO REFERIDO  -------------
        public function delete($id_user) {
            $sqlDeleteOracoes = "DELETE FROM oracao WHERE id_user = ?";
            $stmt = $this->conn->prepare($sqlDeleteOracoes);
            $stmt->bind_param("i", $id_user);

            if (!$stmt->execute()) {
                return false;
            }

            $sql = "DELETE FROM user WHERE id_user = ?";
            $stmt2 = $this->conn->prepare($sql);
            $stmt2->bind_param("i", $id_user);

            return $stmt2->execute();
        }

        public function filterUsers($filterUser) {
            $sql = "SELECT id_user, name, email FROM user WHERE name LIKE ? OR email LIKE ? ORDER BY id_user ASC"; // or
            $stmt = $this->conn->prepare($sql);
            $filterUser = "%$filterUser%";
            $stmt->bind_param("ss", $filterUser, $filterUser);
            $stmt->execute();

            $resultado = $stmt->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

    }

?>