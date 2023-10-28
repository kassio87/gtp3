<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = md5($_POST["senha"]); // Criptografa a senha em MD5

   //  Conecta ao banco de dados e verifica as credenciais
   
    include "config.php";
    

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE none_usuarios = ? AND senha_usuarios = ?");
    $stmt->execute([$usuario, $senha]);

    $row = $stmt->fetch();

    if ($row) {
        // Usuário encontrado no banco de dados
        $_SESSION['usuario'] = $usuario; // Armazena o nome de usuário na sessão
        header("Location: index.php"); // Redireciona para a página inicial

    } else {
        // Usuário não encontrado
        $_SESSION['login_error'] = 'Usuário não encontrado';
       header("Location: login.php"); // Redireciona para a página de login
    }
    
}
