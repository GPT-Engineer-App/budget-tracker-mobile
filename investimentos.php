<?php
session_start();
include('db.php');
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['addInvestimento'])) {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $retorno = $_POST['retorno'];
    $data = $_POST['data'];
    $conta_id = '1234567890'; // Exemplo de conta_id

    $query = "INSERT INTO investimento (nome, valor, retorno, data, conta_id) VALUES ('$nome', '$valor', '$retorno', '$data', '$conta_id')";
    mysqli_query($conn, $query);
    echo "Investimento adicionado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Investimentos</h1>
        <canvas id="investimentosChart"></canvas>
        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Nome do Investimento" required>
            <input type="number" name="valor" placeholder="Valor" required>
            <input type="number" name="retorno" placeholder="Retorno (%)" required>
            <input type="date" name="data" required>
            <button type="submit" name="addInvestimento">Adicionar Investimento</button>
        </form>
        <ul>
            <?php
            $query = "SELECT * FROM investimento";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>{$row['nome']} - {$row['valor']} - {$row['retorno']}% - {$row['data']}</li>";
            }
            ?>
        </ul>
    </div>
    <script src="scripts.js"></script>
</body>
</html>