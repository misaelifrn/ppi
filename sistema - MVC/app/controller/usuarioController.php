<?php 
require_once __DIR__ . '/../model/usuario.php';
require_once __DIR__ . '/../model/tarefa.php';

class UsuarioController{

    private $usuarioModel;
    private $tarefaModel;

    public function __construct(){
        $this->usuarioModel = new Usuario();
        $this->tarefaModel = new Tarefa();
    }

    public function index(){
        if(isset($_SESSION['id_usuario'])){
            header("Location: index.php?action=painel");
            exit;
        }

        include __DIR__ . "/../view/login.php";
    }

    public function autenticar(){
        if(!isset($_POST['email'], $_POST['senha'])){
            header("Location: index.php");
            exit;
        }

        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if(empty($email) || empty($senha)){
            $erro = "Preencha seu email e senha";
            include __DIR__ . "/../view/login.php";
            exit;
        }

        $usuario = $this->usuarioModel->buscarPorEmail($email);

        if($usuario && password_verify($senha, $usuario['senha'])){
            session_regenerate_id(true);
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php?action=painel" );
            exit;
        }

        $erro = "E-mail ou senha estão incorretos";
        include __DIR__ . '/../view/login.php';
    }

    public function painel(){
        if(!isset($_SESSION['id_usuario'])){
            header("Location: index.php");
            exit;
        }
        $tarefas = $this->tarefaModel->listar($_SESSION['id_usuario']);
        include __DIR__ . '/../view/painel.php';
    }

    public function logout(){
        session_destroy();

        header("Location: index.php");
        exit;
    }
}

?>