<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


                    <button id="entrar"> <a href="./dashboard.php"> Entrar</button>
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