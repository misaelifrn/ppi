<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MyPrayers</title>
    <!-- <link rel="stylesheet" href="/../assets/styles/style.css"> -->
    <link rel="stylesheet" href="/../assets/styles/dashboard.css">
</head>
<body>
    <h2 class="my-prayers-title-login">MyPrayers</h2>

    <h1 class="welcome">
        Olá, <?php echo ($_SESSION['name']); ?>! 
        <br> Bem-vindo as suas orações!
    </h1>

    <button class="add-oracao-btn" id="addOracaoBtn"><img src="/../assets/images/icons/plus.svg" alt="plus.svg"></button>
    <div class="bg-dark" id="bgDark"></div>
    <form action="index.php?action=createOracao" method="POST" class="form-oracao" id="formOracao">
        <div class="container-oracao">
            <input type="hidden" name="id_user">

            <div class="box-input title-oracao">
                <label>Título</label>
                <input type="text" name="title" placeholder="Título da oração" id="inputTitle">
            </div>
            
            <div class="box-input body-oracao">
                <label>Oração</label>
                <textarea type="text" name="body" placeholder="Oração" id="inputOracao"></textarea>
            </div>
    
            <div class="buttons-add-oracao">
                <button type="submit" class="add-oracao">Adicionar</button>
                <button class="cancelar-add-oracao" id="cancelarAddOracao">Cancelar</button>
            </div>
        </div>
    </form>

    <div class="box-dashboard">
    
        <?php if (!empty($oracoes)): ?>
            <ul>
                <?php foreach ($oracoes as $oracao): ?>
                    <li>
                        <div class="oracao-infor">
                            <div class="p-oracao p-title-oracao">
                                Título:
                                <?php echo ($oracao['title']); ?> 
                                
                                <div class="actions">
                                    <button class="editar-btn" onclick="abrirModal(<?php echo $oracao['id_oracao']; ?>, '<?php echo ($oracao['body']); ?>')">
                                        <img src="/../assets/images/icons/pencil.svg" alt="pencil.svg"> <!-- ✏️ Editar -->
                                    </button>
                                    <a href="index.php?action=deleteOracao&id_oracao=<?php echo $oracao['id_oracao']; ?>" class="excluir-btn" onclick="return confirm(`Você deseja realmente deletar a oração:\n\n<?php echo $oracao['title']?> \n\n?`)">
                                        <img src="/../assets/images/icons/trash.svg" alt="trash.svg"> <!-- 🗑️ Excluir -->
                                    </a>
                                </div>
                            </div>

                            <p class="p-oracao p-body-oracao">Oração: 
                                <?php echo $oracao['body'] //htmlspecialchars(ltrim()) ?>                           
                            </p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="no-oracoes-box">
                <h2 class="suas-oracoes">Suas orações:</h2>
                <p class="sem-oracoes">Não há orações ainda!</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- <?php include __DIR__.'/modalEditar.php'; ?> -->


    <a href="" class="logout-btn" id="logoutBtn">
        <img src="/../assets/images/icons/door.svg" alt="door.svg">
    </a>

    <!-- <script src="/../assets/scripts/script.js"></script> -->
    <script src="/../assets/scripts/dashboard.js"></script>

</body>
</html>