<?php
session_start();
include('db.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        header('Location: home.php');
    } else {
        echo "Email ou senha incorretos.";
    }
}

if (isset($_POST['register'])) {
    $nomeCompleto = $_POST['nomeCompleto'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    if ($senha == $confirmarSenha) {
        $query = "INSERT INTO usuario (nomeCompleto, email, senha) VALUES ('$nomeCompleto', '$email', '$senha')";
        mysqli_query($conn, $query);
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "As senhas não coincidem.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <h2>Login</h2>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" name="login">Login</button>
            </form>
            <form method="POST" action="">
                <h2>Cadastro</h2>
                <input type="text" name="nomeCompleto" placeholder="Nome Completo" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="password" name="confirmarSenha" placeholder="Confirmar Senha" required>
                <button type="submit" name="register">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>