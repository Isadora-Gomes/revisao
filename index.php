<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/HW-icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <section id="secao-login">
        <div id="box-login">
                <h1>Entre na sua conta</h1>
                <form action="" method="POST">
                    <label for="email">Email</label>
                    <input class="inserir" type="email" name="email" required>

                    <label for="senha">Senha</label>
                    <input id="senha-campo" class="inserir" type="password" name="senha" required>
                    <div id='mostrar'>
                        <input type='checkbox' onclick='mostrarSenha()'> Mostrar senha
                    </div>

                     <?php

                        session_start();
                        include 'conexao.php';

                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            $var_email = $_POST["email"];
                            $var_senha = $_POST["senha"];

                            $query = "SELECT * FROM usuarios WHERE email_usuario = '$var_email'";

                            $result = mysqli_query($conexao, $query);

                            if($result->num_rows > 0) {
                                $usuario_logado = $result->fetch_assoc();

                                if (password_verify($var_senha, $usuario_logado['senha_usuario'])){
                                    $_SESSION['id'] = $usuario_logado['id_usuario'];
                                    $_SESSION['nome'] = $usuario_logado['nome_usuario'];
                                    $_SESSION['email'] = $usuario_logado['email_usuario'];
                                    echo "<script> console.log('a')</script>";
                                    header('Location: dashboard.php?');
                                } else {
                                    echo '<script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                Swal.fire({
                                                    text: "Erro ao logar usuário: ' . $conexao->error . '",
                                                    icon: "error"
                                                });
                                            });
                                        </script>';
                                }
                            }
                        }
                        $conexao->close();
                    ?> 

                    <button id="entrar" type="submit">Entrar</button>
                    <p class="celular">Não tem uma conta? <a href="./cadastro.php">Cadastre-se!</a></p>
                </form>
        </div>
        <div id="box-welcome">
            <h2>Não tem uma conta?</h2>
            <p>Entre com seus dados pessoais e comece sua jornada conosco</p>
            <button id="cadastrar-button" onclick="window.location='./cadastro.php'"><a href="./cadastro.php">Cadastre-se</a></button>
        </div>
    </div>
</section>
<script>
    function mostrarSenha() {
        var x = document.getElementById("senha-campo");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>