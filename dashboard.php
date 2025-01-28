<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_login";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_errno);
}

// Consulta os usuários
$sqlUsuarios = "SELECT nome_usuario FROM usuarios";
$resultUsuarios = $conexao->query($sqlUsuarios);

// Consulta os produtos
$sqlProdutos = "SELECT nome_produto FROM produtos";
$resultProdutos = $conexao->query($sqlProdutos);

// Obtém os produtos em um array para uso no loop
$produtos = [];
if ($resultProdutos->num_rows > 0) {
    while ($produto = $resultProdutos->fetch_assoc()) {
        $produtos[] = $produto['nome_produto'];
    }
}

// Variável para rodar produtos em loop se houver menos usuários
$indexProduto = 0;
$totalProdutos = count($produtos);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários e Produtos</title>
</head>
<body>
    <h1>Lista de Usuários e Produtos</h1>
    <ul>
        <?php
        if ($resultUsuarios->num_rows > 0) {
            while ($usuario = $resultUsuarios->fetch_assoc()) {
                echo "<li>";
                echo htmlspecialchars($usuario['nome_usuario']);
                if ($totalProdutos > 0) {
                    // Exibe um produto associado
                    echo " - Produto: " . htmlspecialchars($produtos[$indexProduto]);
                    $indexProduto = ($indexProduto + 1) % $totalProdutos; // Roda os produtos em loop
                } else {
                    echo " - Produto: Nenhum produto disponível";
                }
                echo "</li>";
            }
        } else {
            echo "<li>Nenhum usuário encontrado</li>";
        }
        ?>
    </ul>
</body>
</html>
