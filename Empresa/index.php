<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="view/css/style.css">
    <script src="view/js/datetime.js"></script>
</head>
<body>
<header>
        <nav class="nav-header">
            <ul>
                <li class="dropdown dropbtn">
                </li>
            </ul>
        </nav>
    </header>
<main>
    <div class="form-container">
        <fieldset>
            <?php include_once 'controller\recebe/recebeLogin.php'; ?>
                <form method="POST" action="">
                    <section id="login">
                        <legend> Login </legend><br>      
                            <input type="text" id="funcional" placeholder="Insira seu funcional:" name="txtFuncional" required><br><br>
                            <input type="password" id="senha" placeholder="Senha: " name="txtSenha" maxlength="30" step="0.01" required><br><br>
                            <input type="submit" name="btnEnviar" value="Enviar"><br>
                    </section><br>
                </form>
        </fieldset>
    </div>
</main>
        <footer>Desenvolvedores: Miguel e Brenda.</footer>
    </body>
</html>
