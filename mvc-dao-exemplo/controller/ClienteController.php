<?php

    include("../model/Cliente.php");
    include("../DAO/ClienteDAO.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    $clie = new Cliente();
    $clieDAO = new ClienteDAO();

    $clie->setId($id);
    $clie->setNome($nome);
    $clie->setIdade($idade);

    $acao = $_POST["acao"];

    if ($acao == "Cadastrar") {
        $clieDAO->cadastrar($clie);
        header("Location: ../views/cliente.php");
    } else if ($acao == "Atualisar") {
        $clieDAO->atualisar($clie);
        header("Location: ../views/cliente.php");
    } else if ($acao == "Remover") {
        $clieDAO->remover($id);
        header("Location: ../views/cliente.php");
    } else if ($acao == "Consultar") {
        $clieDAO->consultar();
    }

?>