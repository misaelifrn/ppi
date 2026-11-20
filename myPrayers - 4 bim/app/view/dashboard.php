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
            <h2 class="inserir-oracao-title">Inserir oração</h2>

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
        <form action="index.php?action=dashboard" method="POST" class="filter-oracao" id="filterOracao">
            <input type="search" name="filter_oracao" id="filterOracaoInput" placeholder="Filtrar orações...">
            
            <div class="filter-buttons">
                <button type="submit" id="filterOracaoBtn">
                    <img src="/../assets/images/icons/search.svg" alt="search.svg">
                </button>
                <a href="index.php?action=dashboard" id="clearFilter"><img src="/../assets/images/icons/close.svg" alt="close.svg"></a>
            </div>
        </form>

        <?php if (!empty($oracoes)): ?>
            <ul>
                <?php foreach ($oracoes as $oracao): ?>
                    <li>
                        <div class="oracao-infor">
                            <div class="p-oracao p-title-oracao">
                                <div>
                                    <b>Título:</b>
                                    <?php echo ($oracao['title']); ?> 
                                </div>
                                
                                <div class="actions">
                                    <button class="editar-btn" onclick="openUpdate(<?php echo $oracao['id_user']; ?>, <?php echo $oracao['id_oracao']; ?>, '<?php echo ($oracao['title']); ?>', `<?php echo ($oracao['body']); ?>`)"> <!-- json_encode()-->
                                        <img src="/../assets/images/icons/pencil.svg" alt="pencil.svg"> <!-- ✏️ Editar -->
                                    </button>
                                    <a href="index.php?action=deleteOracao&id_oracao=<?php echo $oracao['id_oracao']; ?>" class="excluir-btn" onclick="return confirm(`Você deseja realmente deletar a oração:\n\n<?php echo $oracao['title']?> \n\n?`)">
                                        <img src="/../assets/images/icons/trash.svg" alt="trash.svg"> <!-- 🗑️ Excluir -->
                                    </a>
                                </div>
                            </div>

                            <p class="p-oracao p-body-oracao"><b>Oração:</b> 
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

    <div class="bg-dark" id="bgDarkUpdate"></div>
    <form action="index.php?action=updateOracao" method="POST" class="form-oracao" id="formOracaoUpdate">
        <div class="container-oracao">
            <h2 class="inserir-oracao-title">Editar oração</h2>

            <input type="hidden" name="id_user" id="idUserUpdate">
            <input type="hidden" name="id_oracao" id="idOracaoUpdate">

            <div class="box-input title-oracao">
                <label>Título</label>
                <input type="text" name="title" placeholder="Título da oração" id="inputTitleUpdate">
            </div>
            
            <div class="box-input body-oracao">
                <label>Oração</label>
                <textarea type="text" name="body" placeholder="Oração" id="inputOracaoUpdate"></textarea>
            </div>
    
            <div class="buttons-add-oracao">
                <button type="submit" class="add-oracao">Atualizar</button>
                <button class="cancelar-add-oracao" onclick="closeUpdate()">Cancelar</button>
            </div>
        </div>
    </form>

    <a href="" class="logout-btn" id="logoutBtn">
        <img src="/../assets/images/icons/door.svg" alt="door.svg">
    </a>

    <!-- <script src="/../assets/scripts/script.js"></script> -->
    <script src="/../assets/scripts/dashboard.js"></script>

</body>
</html>