<?php
session_start(); // Inicia a sessão

include "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento (GTP)</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <form class="form" method="post" action="processar_login.php">
            <img src="img/logo-gpt.png" width="70%" margin="auto" alt="Conectar com o Google">
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="senha" placeholder="Digite sua senha">
            </div>
            <?php
            if (isset($_SESSION['login_error'])) {
                echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
                unset($_SESSION['login_error']); // Limpa a variável de sessão
            }
            ?>
            <input type="submit" value="Entrar">

            <div class="forgot-password">
                <a href="reset.html">Esqueceu sua senha?</a><br>
            </div>
        </form>

    </div>
</body>

</html>