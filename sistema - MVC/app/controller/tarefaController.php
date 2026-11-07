<?php

    require_once __DIR__.'/../model/tarefa.php';

    class tarefaController {
        private $tarefaModel;

        public function __construct() {
            $this->tarefaModel = new Tarefa();
        }

        // public function index() {
        //     $tarefas = $this->tarefaModel->listar();
        //     // include __DIR__.'/../view/painel.php';
        // }
        
        public function criar() {
            if(isset($_SESSION['id_usuario']) && isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
                $this->tarefaModel->criar($_SESSION['id_usuario'], $_POST['descricao']);
            } 
            header("Location: index.php?action=painel");
        }
        
        public function excluir() {
            if(isset($_GET['id_tarefa']) && isset($_SESSION['id_usuario'])) {
                $this->tarefaModel->excluir($_GET['id_tarefa'], $_SESSION['id_usuario']);
            } 
            header("Location: index.php?action=painel");
        }

        public function editar() {
            if(isset($_SESSION['id_usuario']) && isset($_POST['id_tarefa']) && isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) { 
                $this->tarefaModel->editar($_POST['id_tarefa'], $_SESSION['id_usuario'], $_POST['descricao']);
            }
            header("Location: index.php?action=painel");
        }
    }

?>