<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <form action="login.php" method="POST" class="global-form">
        <table class="box">
            <ul>
                <li><input type="email" name="email" placeholder="E-mail" required></li>
                <li><input type="password" name="senha" placeholder="Senha" required></li>
                <li><button type="submit">Entrar</button></li>
            </ul>
        </table>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($senha, $user['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $user['id'];
            header("Location: index.html");
            exit;
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>
</body>
</html>