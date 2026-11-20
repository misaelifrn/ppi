<?php 

    require_once __DIR__.'/../config/Database.php';

    class Oracao {

        private $conn;

        public function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        public function create($id_user, $title, $body) {
            $sql = "INSERT INTO oracao (id_user, title, body) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iss", $id_user, $title, $body);
            return $stmt->execute();
        }

        public function read($id_user) {
            $sql = "SELECT * FROM oracao WHERE id_user = ? ORDER BY data_create DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id_user);
            $stmt->execute();

            $resultado = $stmt->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function update($id_oracao, $id_user, $title, $body) {
            $sql = "UPDATE oracao SET title = ?, body = ? WHERE id_oracao = ? AND id_user = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssii", $title, $body, $id_oracao, $id_user);
            return $stmt->execute();
        }

        public function delete($id_oracao, $id_user) {
            $sql = "DELETE FROM oracao WHERE id_oracao = ? AND id_user = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $id_oracao, $id_user);
            return $stmt->execute();
        }

        public function filterOracao($id_user, $filterOracao) {
            $sql = "SELECT * FROM oracao WHERE id_user = ? AND (title LIKE ? OR body LIKE ?) ORDER BY data_create DESC"; // or
            $stmt = $this->conn->prepare($sql);
            $filterOracao = "%$filterOracao%";
            $stmt->bind_param("iss", $id_user, $filterOracao, $filterOracao);
            $stmt->execute();

            $resultado = $stmt->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }

?>