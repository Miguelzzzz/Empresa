<?php include_once '../../controller/checarAdmin.php' ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cargo</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/datetime.js"></script>
</head>
<body>

<?php include_once '../layout/header.php'; ?>

<main>
    <div class="form-container">
        <fieldset>
            <?php include_once '../../controller/recebe/recebeCargo.php'; ?>
                <form method="POST" action="">
                    <section id="cargo">
                        <legend> Dados do Cargo </legend><br>      
                            <input type="text" id="nomeCargo" placeholder="Nome Cargo:" name="txtNomeCargo" required><br><br>
                            <input type="number" id="salario" placeholder="Salário: " name="salario" maxlength="9" max="999999.99" step="0.01" required><br><br>
                            <input type="datetime-local" id="datetime" name="datetime"><br>
                            <input type="submit" name="btnEnviar" value="Cadastrar"><br>
                    </section><br>
                </form>
        </fieldset>
    </div>
</main>

        <footer>Desenvolvedores: Miguel e Brenda.</footer>
    </body>
</html>
