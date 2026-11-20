<?php

// ------------- FAZER OS MÉTODOS DO CRUD: UPDATE E DELETE (DELETE SÓ PARA O ADMIN) -------------

    require_once __DIR__.'/../model/User.php';
    require_once __DIR__.'/../model/Oracao.php';

    class UserController {

        private $userModel;
        private $oracaoModel;

        public function __construct() {
            $this->userModel = new User();
            $this->oracaoModel = new Oracao();
        }

        public function index() {
            if (isset($_SESSION['id_user'])) {
                header("Location: index.php?action=dashboard");
                exit;
            }

            include __DIR__.'/../view/login.php';
        }

        public function authenticate() {
            if (!isset($_POST['email'], $_POST['password'])) {
                header("Location: index.php");
                exit;
            }

            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $error = "Preencha seu email e senha!";
                include __DIR__.'/../view/login.php';
                exit;
            }

            $user = $this->userModel->searchForEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);

                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['name'] = $user['name'];

                header("Location: index.php?action=dashboard");
                exit;
            }

            $error = "Email ou senha estão incorretos!";
            include __DIR__.'/../view/login.php';
        }

        public function register() {
            if (!isset($_POST['nome'], $_POST['email'], $_POST['password'])) {
                header("Location: index.php?action=dashboard");
                exit;
            }

            $name = $_POST['nome'];
            $email = trim($_POST['email']);
            $password = $_POST['password'];          

            if (empty($name) || empty($email) || empty($password)) {
                $error = "Preencha seu nome, email e senha!";
                include __DIR__.'/../view/register.php';
                exit;
            }

            $id_user = $this->userModel->create($name, $email, $password);

            if (!$id_user) {
                $error = "Não foi possível realizar o cadastro!";
                include __DIR__.'/../view/register.php';
                exit;
            }
            
            session_regenerate_id(true);

            $_SESSION['id_user'] = $id_user;
            $_SESSION['name'] = $name;
            
            header("Location: index.php?action=dashboard");
            exit;
        }

        public function dashboard() {
            if (!isset($_SESSION['id_user'])) {
                header("Location: index.php");
                exit;
            }

            if (isset($_POST['filter_oracao']) && !empty(trim($_POST['filter_oracao']))) {
                $oracoes = $this->oracaoModel->filterOracao($_SESSION['id_user'], trim($_POST['filter_oracao']));
            } else {
                $oracoes = $this->oracaoModel->read($_SESSION['id_user']);
            }

            include __DIR__.'/../view/dashboard.php';
        }

        public function delete() {
            session_destroy();
            $this->userModel->delete($_SESSION['id_user']);
            // if (isset($_SESSION['id_user']) && isset($_GET['id_oracao'])) {
            // }
            header("Location: index.php");
        }

        public function logout() {
            session_destroy();

            header("Location: index.php");
            exit;
        }

    }

?>