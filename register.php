<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

<body>
    <form action="register.php" method="POST">
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Registrar</button>
    </form>
<?php
// filepath: c:\xampp\htdocs\astroneer\register.php
include 'conexao.php'; // arquivo com conexão ao banco

$name = $_POST['name'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // senha segura

$sql = "INSERT INTO usuario (amen, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $senha);

if ($stmt->execute()) {
    echo "Usuário registrado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}
?>

</body>
</html>