<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Departamento</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/datetime.js"></script>
</head>
<body>
<?php include_once '../layout/header.php';?>
<main>
    <div class="form-container">
        <fieldset>
            <?php include_once '../../controller/recebe/recebeDepartamento.php';?>
            <form method="POST" action="">
                <section id="cargo">
                    <legend> Dados do Departamento</legend><br>
                            
                    <input type="text" id="nomeDepartamento" placeholder="Nome Departamento:" name="txtNomeDepart" required><br><br>
                    <input type="datetime-local" id="datetime" name="datetime"><br>
                    <input type="submit" name="btnEnviar" value="Cadastrar">
                        <br>
                </section><br>
           </form>
        </fieldset>
    </div>
</main>
        <footer>Desenvolvedores: Miguel e Brenda.</footer>
    </body>
</html>
