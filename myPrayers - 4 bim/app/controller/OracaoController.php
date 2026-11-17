<?php 

    require_once __DIR__.'/../model/oracao.php';

    class OracaoController {

        private $oracaoModel;

        public function __construct() {
            $this->oracaoModel = new Oracao();
        }

        public function create() {
            if (isset($_SESSION['id_user']) && isset($_POST['title']) && isset($_POST['body']) && !empty(trim($_POST['title'])) && !empty(trim($_POST['body']))) {
                $this->oracaoModel->create($_SESSION['id_user'], $_POST['title'], $_POST['body']);
            }
            header("Location: index.php?action=dashboard");
        }

        public function update() {
            if (isset($_SESSION['id_user']) && isset($_POST['id_oracao'])&& isset($_POST['title']) && isset($_POST['body']) && !empty(trim($_POST['title'])) && !empty(trim($_POST['body']))) {
                $this->oracaoModel->update($_POST['id_oracao'], $_SESSION['id_user'], $_POST['title'], $_POST['body']);
            }
            header("Location: index.php?action=dashboard");
        }

        public function delete() {
            if (isset($_SESSION['id_user']) && isset($_GET['id_oracao'])) {
                $this->oracaoModel->delete($_GET['id_oracao'], $_SESSION['id_user']);
            }
            header("Location: index.php?action=dashboard");
        }

    }

?>