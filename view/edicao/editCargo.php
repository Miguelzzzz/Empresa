<?php include_once '../../controller/edita/editaCargo.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição Cargo</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/datetime.js"></script>
</head>
<body>  
    <?php include_once '../layout/header.php';?>
    <main>
        <div class="form-container">
            <fieldset>
                <form method="POST" action="">
                    <section id="cargo">
                        <legend>Dados do Cargo</legend><br>
                        <input type="hidden" id="codCargo" name="codCargo" value="<?php echo htmlspecialchars($dadosCargo['codCargo']); ?>">
                        <input type="datetime-local" id="datetime" name="datetime" value="<?php echo htmlspecialchars($dadosCargo['created_at']); ?>" hidden>
                        <input type="text" id="nomeCargo" placeholder="Nome Cargo:" name="txtNomeNCargo" value="<?php echo htmlspecialchars($dadosCargo['nomeCargo']); ?>" required><br><br>
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
