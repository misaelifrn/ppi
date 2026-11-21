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

            // admin
            if ($user && password_verify($password, $user['password']) && $user['name'] == "Admin" && $user['email'] == "admin@gmail.com" || $user['email'] == "admin33@gmail.com") {
                session_regenerate_id(true);
                
                $_SESSION['admin'] = true;
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['name'] = $user['name'];

                header("Location: index.php?action=admin");
                exit;
            }

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

        public function registerAdmin() {
            if (!isset($_SESSION['id_user']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
                header("Location: index.php");
                exit;
            }

            if (!isset($_POST['nome'], $_POST['email'], $_POST['password'])) {
                header("Location: index.php?action=admin");
                exit;
            }

            $name = $_POST['nome'];
            $email = trim($_POST['email']);
            $password = $_POST['password'];          

            if (empty($name) || empty($email) || empty($password)) {
                // $error = "Preencha seu nome, email e senha!";
                // include __DIR__.'/../view/register.php';
                echo("Preencha seu nome, email e senha!");
                exit;
            }

            $id_user = $this->userModel->create($name, $email, $password);

            if (!$id_user) {
                echo("Não foi possível realizar o cadastro!");
                exit;
            }
            
            session_regenerate_id(true);            
            header("Location: index.php?action=admin");
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

        public function dashboardAdmin() {
            if (!isset($_SESSION['id_user']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
                header("Location: index.php");
                exit;
            }

            if (isset($_POST['filter_user']) && !empty(trim($_POST['filter_user']))) {
                $users = $this->userModel->filterUsers(trim($_POST['filter_user']));
            } else {
                $users = $this->userModel->read();
            }

            include __DIR__.'/../view/admin/dashboard.php';
        }

        public function deleteAdmin() {
            if (!isset($_SESSION['id_user']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
                $this->userModel->delete($_GET['id_user']);
            }

            header("Location: index.php?action=admin");
            exit;
        }

        //     if (isset($_SESSION['id_user']) && isset($_GET['id_user'])) {

        //         $idUser = (int) $_GET['id_user'];
        //         $idLogged = (int) $_SESSION['id_user'];

        //         if ($this->userModel->delete($idUser)) {

        //             // Verifica se o usuário excluiu a própria conta
        //             if ($idUser === $idLogged) {

        //                 // Encerra a sessão
        //                 session_unset();
        //                 session_destroy();

        //                 // Redireciona para o login
        //                 header("Location: index.php?action=login");
        //                 exit;
        //             }
        //         }
        //     }

        public function updateAdmin() {
            if (!isset($_SESSION['id_user']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != true && isset($_POST['id_user'])  && isset($_POST['nome']) && isset($_POST['email']) && !empty(trim($_POST['nome'])) && !empty(trim($_POST['email']))) {
                $this->userModel->update($_POST['id_user'], $_POST['nome'], $_POST['email']);
            }
            header("Location: index.php?action=admin");
        }

        public function logout() {
            session_destroy();

            header("Location: index.php");
            exit;
        }

        // public function filterUsers() {
        //     $this->userModel->filterUsers($_POST['filter_user']);

        //     header("Location: index.php?action=admin");
        // }

    }

?>