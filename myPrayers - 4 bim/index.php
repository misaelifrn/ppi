<?php

    session_start();

    require_once __DIR__.'/app/controller/UserController.php';
    require_once __DIR__.'/app/controller/OracaoController.php';

    $userController = new UserController();
    $oracaoController = new OracaoController();

    $action = $_GET['action'] ?? 'index';
    
    switch($action){
        case 'authenticate':
            $userController->authenticate();
            break;
        case 'register':
            $userController->register();
            break;
        case 'dashboard':
            $userController->dashboard();
            break;
        case 'admin':
            $userController->dashboardAdmin();
            break;
        case 'registerAdmin':
            $userController->registerAdmin();
            break;
        case 'updateAdmin':
            $userController->updateAdmin();
            break;
        case 'deleteAdmin':
            $userController->deleteAdmin();
            break;

        case 'logout':
            $userController->logout();
            break;

        case 'createOracao':
            $oracaoController->create();
            break;

        case 'updateOracao':
            $oracaoController->update();
            break;

        case 'deleteOracao':
            $oracaoController->delete();
            break;

        // case 'filter_oracao':
        //     $oracaoController->delete();
        //     break;

        default:
            $userController->index();
            // $tarefaController->index();
            break;
    }
?>