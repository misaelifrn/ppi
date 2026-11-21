<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MyPrayers</title>
    <!-- <link rel="stylesheet" href="/../assets/styles/style.css"> -->
    <link rel="stylesheet" href="/../assets/styles/dashboard.css">
</head>
<body class="body-admin" id="bodyAdmin">
    <h2 class="my-prayers-title-login">MyPrayers</h2>

    <h1 class="welcome">
        Olá, <?php echo ($_SESSION['name']); ?>! 
        <br> Bem-vindo ao painel de controle!
    </h1>

    <button class="add-oracao-btn" id="addUserAdmin"><img src="/../assets/images/icons/plus.svg" alt="plus.svg"></button>
    <div class="bg-dark-admin" id="bgDarkAdmin"></div>
    <form action="/index.php?action=registerAdmin" method="POST" class="register-admin" id="formRegisterAdmin">
        <h1>Cadastrar usuário</h1>

        <div class="input-container">
            <div class="input-box">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Insira seu nome... Ex.: João Pedro">
            </div>

            <div class="input-box">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="Insira seu e-mail... Ex.: joao@gmail.com">
            </div>

            <div class="input-box">
                <label>Senha</label>
                <div class="password-box">
                    <input type="password" name="password" id="inputAddUserPassword" placeholder="Insira sua senha... Ex.: 12aB@.87">
                    <img src="/../assets/images/icons/eye&visible.svg" alt="eye&visible.svg" class="eye-login" id="eyeAddUserPassword">
                </div>
            </div>
        </div>

        <div class="actions-register-admin">
            <button type="submit">Cadastrar</button>
            <button id="noAddUserAdmin">Cancelar</button>
        </div>
    </form>

    
    <div class="box-dashboard box-dashboard-admin">
        <form action="index.php?action=admin" method="POST" class="filter-oracao filter-users" id="filterUsers">
            <input type="text" name="filter_user" id="filterUserInput" placeholder="Filtrar usuários..." value="<?php echo htmlspecialchars($_POST['filter_user'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"> <!-- "??" == isset; ENT_QUOTES == quais aspas serão convertidas pelo htmlspecialchars; UTF-8 == tradução da linguagem (codificação) -->
            
            <div class="filter-buttons">
                <button type="submit" id="filterUserBtn">
                    <img src="/../assets/images/icons/search.svg" alt="search.svg">
                </button>
                <a href="index.php?action=admin" id="clearFilter"><img src="/../assets/images/icons/close.svg" alt="close.svg"></a>
            </div>
        </form>

        <?php if (!empty($users)): ?>
            <table border="1">
                <tr>
                    <th class="id-li">ID</th>
                    <th class="nome-li">Nome</th>
                    <th class="email-li">Email</th>
                    <th class="email-li">Ações</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr class="line-table">
                        <td>
                            <?php echo ($user['id_user']); ?> 
                        </td>
                        <td>
                            <?php echo $user['name'] ?>      
                        </td>
                        <td>
                            <?php echo $user['email'] ?>
                        </td>
                        <td class="actions">
                            <button class="show-btn"> <!-- Falta apenas visualizar as orações -->
                                <img src="/../assets/images/icons/eye&visible.svg" alt="eye.svg">
                            </button>
                            <button class="editar-btn" onclick="openUpdateAdmin(<?php echo $user['id_user']; ?>, '<?php echo ($user['name']); ?>', `<?php echo ($user['email']); ?>`)"> <!-- json_encode()-->
                                <img src="/../assets/images/icons/pencil.svg" alt="pencil.svg"> <!-- ✏️ Editar -->
                            </button>
                            <a href="index.php?action=deleteAdmin&id_user=<?php echo $user['id_user']; ?>" class="excluir-btn" onclick="return confirm(`Você deseja realmente deletar o usuário:\n\n<?php echo $user['name']?> \n\n?`)">
                                <img src="/../assets/images/icons/trash.svg" alt="trash.svg"> <!-- 🗑️ Excluir -->
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <div class="no-oracoes-box">
                <h2 class="suas-oracoes">Usúarios cadastrados:</h2>
                <p class="sem-oracoes">Não há nenhum usuário cadastrado!</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="bg-dark-admin" id="bgDarkAdmin"></div>
    <form action="/index.php?action=updateAdmin" method="POST" class="register-admin" id="formAdminUpdate">
        <h1>Editar usuário</h1>

        <input type="hidden" name="id_user" id="idUserUpdateAdmin">

        <div class="input-container">
            <div class="input-box">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Insira seu nome... Ex.: João Pedro" id="nameUpdateAdmin">
            </div>

            <div class="input-box">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="Insira seu e-mail... Ex.: joao@gmail.com" id="emailUpdateAdmin">
            </div>
        </div>

        <div class="actions-register-admin">
            <button type="submit">Salvar</button>
            <button onclick="closeUpdateAdmin()">Cancelar</button>
        </div>
    </form>

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

    <div class="clock">
        <p class="clock-hour" id="clockHour"></p>
        <p class="points-hour">:</p>
        <p class="clock-minutes" id="clockMinutes"></p>
    </div>

    <a href="" class="logout-btn" id="logoutBtn">
        <img src="/../assets/images/icons/door.svg" alt="door.svg">
    </a>

    <!-- <script src="/../assets/scripts/script.js"></script> -->
    <script src="/../assets/scripts/admin/dashboard.js"></script>

</body>
</html>