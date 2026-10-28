<?php
session_start();
require_once __DIR__ . '/app/controller/usuarioController.php';
$controller = new UsuarioController();
$action = $_GET['action'] ?? 'index';
switch($action){
    case 'autenticar':
        $controller->autenticar();
        break;

    case 'painel':
        $controller->painel();
        break;

    case 'logout':
        $controller->logout();
        break;

    default:
        $controller->index();
        break;
}
?>





<!-- 
<?php 

require_once __DIR__ . '/app/controller/controller.php';

$controller = new tarefaController();


$action = $_GET['action'] ?? 'index';

switch($action) {
    case 'criar':
        $controller->criar();
        break;
    case 'excluir':
        $controller->excluir();
        break;
    case 'editar':
        $controller->editar();
        break;
    default:
        $controller->index();
        break;
}

?> -->