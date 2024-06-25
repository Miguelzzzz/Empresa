<?php include_once '../../controller/edita/editaDepartamento.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição Departamento</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../layout/header.php';?>
    <main>
        <div class="form-container">
            <fieldset>
                <form method="POST" action="">
                    <section id="departamento">
                        <legend>Dados do Departamento</legend><br>
                        <input type="hidden" id="codDepartamento" name="codDepartamento" value="<?php echo htmlspecialchars($dadosDepartamento['codDepartamento']); ?>">
                        <input type="text" id="nomeDepartamento" placeholder="Nome Departamento:" name="txtNomeNDepartamento" value="<?php echo htmlspecialchars($dadosDepartamento['nomeDepartamento']); ?>" required><br><br>
                        <input type="submit" name="btnEnviar" value="Alterar">
                        <br>
                    </section><br>
                </form>
            </fieldset>
        </div>
    </main>
    <footer>Desenvolvedores: Matheus, Miguel e Pedro.</footer>
</body>
</html>
