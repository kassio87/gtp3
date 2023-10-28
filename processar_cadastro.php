<?php
// Inclua o arquivo de configuração
include "config.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeUsuario = $_POST["usuario"];
    $senha = md5($_POST["senha"]);
    $permissao = $_POST["permissoes"];

    try {
        // Use a conexão definida em config.php
        $stmt = $conn->prepare("INSERT INTO usuarios (nome_usuarios, senha_usuarios, permissao_usuario) VALUES (?, ?, ?)");
        $stmt->execute([$nomeUsuario, $senha, $permissao]);

        // Redireciona para a página de sucesso ou outra página desejada
        header("Location: sucesso.php");
    } catch (PDOException $e) {
        // Lidar com erros da conexão
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}
?>


