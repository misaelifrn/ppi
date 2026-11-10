<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel | Sistema - MVC</title>
    <link rel="stylesheet" href="/../assets/styles/style.css">
</head>

<body>
    <h1 class="title">Sistema - MVC</h1>

    <h1 class="welcome">
        Bem-vindo ao painel,
        <?php echo ($_SESSION['nome']); ?>!
    </h1>

    <p class="message">Pressione "<b class="ponto-e-virgula">;</b>" para digitar uma nova tarefa!</p>

    <div class="box-painel">
        <form action="index.php?action=criar" method="POST">
            <input type="text" name="descricao" placeholder="Descrição da tarefa" id="inputDescricao">
            <button type="submit">Adicionar</button>
        </form>
    
        <!-- <h2 class="suas-tarefas">Suas tarefas</h2> -->
        <?php if (!empty($tarefas)): ?>
            <ul>
                <?php foreach ($tarefas as $tarefa): ?>
                    <li>
                        <?php echo ($tarefa['descricao']); ?>
                        <div class="actions">
                            <button class="editar-btn" onclick="abrirModal(<?php echo $tarefa['id_tarefa']; ?>, '<?php echo ($tarefa['descricao']); ?>')">
                                ✏️<!-- Editar -->
                            </button>
                            <a href="index.php?action=excluir&id_tarefa=<?php echo $tarefa['id_tarefa']; ?>" class="excluir-btn" onclick="return confirm(`Você deseja realmente deletar a tarefa:\n\n<?php echo $tarefa['descricao']?> ?`)">
                                🗑️<!-- Excluir -->
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h2 class="suas-tarefas">Suas tarefas</h2>
            <p class="sem-tarefas">Não há tarefas ainda!</p>
        <?php endif; ?>
    </div>

    <?php include __DIR__.'/modalEditar.php'; ?>

    <p class="logout-btn">
        <a href="" id="logoutBtn">Sair</a> <!-- index.php?action=logout -->
    </p>

    <script>
        function abrirModal(idTarefa, descricao){
            document.getElementById("editarIdTarefa").value = idTarefa;
            document.getElementById("editarDescricao").value = descricao;

            let modalEditar = document.getElementById("modalEditar");
            let modalConteudo = document.getElementById("modalConteudo");

            modalEditar.style.opacity = 1;
            modalEditar.style.visibility = 'visible';
            modalEditar.style.pointerEvents = 'auto';

            modalConteudo.style.opacity = 1;
            modalConteudo.style.visibility = 'visible';
            modalConteudo.style.pointerEvents = 'auto';
        }

        function fecharModal(){
            let modalEditar = document.getElementById("modalEditar");
            let modalConteudo = document.getElementById("modalConteudo");

            modalEditar.style.opacity = 0;
            modalEditar.style.visibility = 'hidden';
            modalEditar.style.pointerEvents = 'none';

            modalConteudo.style.opacity = 0;
            modalConteudo.style.visibility = 'hidden';
            modalConteudo.style.pointerEvents = 'none';
        }

        let inputDescricao = document.getElementById("inputDescricao");
        document.addEventListener('keydown', function(event) {
            if(event.key === ";") {
                event.preventDefault();
                inputDescricao.focus();
                inputDescricao.value = '';
            }
        });

        let logoutBtn = document.getElementById("logoutBtn");
        logoutBtn.addEventListener('click', function () {
            if(confirm("Você deseja realmente sair?") == true) {
                logoutBtn.href = 'index.php?action=logout';
            } else {
                logoutBtn.href = '';
            }
        });
    </script>

</body>
</html>