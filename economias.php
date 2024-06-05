<?php
session_start();
include('db.php');
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['addEconomia'])) {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $conta_id = '1234567890'; // Exemplo de conta_id

    $query = "INSERT INTO transacao (descricao, valor, data, tipo, conta_id) VALUES ('$descricao', '$valor', '$data', 'Crédito', '$conta_id')";
    mysqli_query($conn, $query);
    echo "Economia adicionada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economias</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Economias</h1>
        <canvas id="economiasChart"></canvas>
        <form method="POST" action="">
            <input type="text" name="descricao" placeholder="Descrição" required>
            <input type="number" name="valor" placeholder="Valor" required>
            <input type="date" name="data" required>
            <button type="submit" name="addEconomia">Adicionar Economia</button>
        </form>
        <ul>
            <?php
            $query = "SELECT * FROM transacao WHERE tipo='Crédito'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>{$row['descricao']} - {$row['valor']} - {$row['data']}</li>";
            }
            ?>
        </ul>
    </div>
    <script src="scripts.js"></script>
</body>
</html>