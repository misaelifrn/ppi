<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Clientes - PABD</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 90vh;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;

            padding: 15px;
            background-color: rgb(0, 0, 0, 0.6);
            border-radius: 10px;
        }

        .botoes {
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 10px;
        }
    </style>
</head>
<body>

    <form action="../controller/ClienteController.php" method="POST">
        <h1>Gerenciamento de Clientes</h1>
        
        <label>ID</label>
        <input type="number" name="id">
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Idade</label>
        <input type="number" name="idade">

        <div class="botoes">
            <button type="submit" name="acao" value="Cadastrar">Cadastrar</button>
            <button type="submit" name="acao" value="Atualisar">Atualisar</button>
            <button type="submit" name="acao" value="Remover">Remover</button>
            <button type="submit" name="acao" value="Consultar">Consultar</button>
        </div>
    </form>

</body>
</html>