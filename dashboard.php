<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="processar.php" method="POST">
        <label for="categoria">a</label>
        <select name="categoria" id="categoria">
            <?php
            include 'conexao.php';
            $sql = "SELECT id, nome FROM categorias";
            $result = $conexao->query($sql);
            echo "<script> console.log('c')</script>";
            if ($result && $result->num_rows > 0) {
                echo "<script> console.log('a')</script>";
                while ($row = $result->fetch_assoc()) {
                    echo "<script> console.log('b')</script>";
                    echo '<option value="' . $row['nome_usuario']. '</option>';
                }
            } else {
                echo '<option value="">Nenhuma categoria encontrada</option>';
            }
            ?>
        </select>
    </form>
</body>
</html>