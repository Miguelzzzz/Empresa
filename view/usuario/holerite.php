<?php include_once '../../controller/checarUsuario.php' ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holerite usuario</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/relatorio.css">
    <script src="../js/datetime.js"></script>
    <script src="../js/img.js"></script>
</head>

<body>

<?php include_once '../layout/headerUsuario.php';?>

<!-- <header>

        <nav class="nav-header">
            <ul>
                <li class="dropdown dropbtn">
                    <div>Funcionario</div>
                    <div class="dropdown-content">
                        <a href="view/usuario/perfil.php">• Consultar dados pessoais </a>
                        <a href="view/usuario/HoleritePessoal.php">• Holerite </a>
                    </div>
                </li>
            </ul>
        </nav>
    </header> -->

    <main>
        <section class="const_table"><br>
            <?php include_once '../../controller/usuario/perfilFuncionario.php'; ?>
            <div class="imagem-lista">
                <form method="POST" enctype="multipart/form-data" action="">
                    <img src="../../<?php echo htmlspecialchars($funcionarios['img']); ?>" style="height: 130px; border-radius: 10px; "><br>
                    <input type="hidden" name="input-funcional" value="<?php echo htmlspecialchars($funcionarios['funcional']); ?>">
                    <input type="file" name="img" class="btn btn-success" accept="image/png, image/jpeg"><br><br>
            </div>

            <ul class="dados-lista">
                <li><h4>Funcional: </h4><?php echo htmlspecialchars($funcionarios['funcional']); ?></li><br><br>
                <li><h4>CPF: </h4><?php echo htmlspecialchars($funcionarios['cpf']); ?></li><br><br>
                <li><h4>Nome: </h4><?php echo htmlspecialchars($funcionarios['nome']); ?></li><br><br>
                <li><h4>Telefone: </h4> <input type="text" name="txtNTelefone" placeholder="Telefone: " value="<?php echo htmlspecialchars($funcionarios['telefone']); ?>" required></li><br><br>
                <li><h4>Endereço: </h4> <input type="text" name="txtNEndereco" placeholder="Endereço: " value="<?php echo htmlspecialchars($funcionarios['endereco']); ?>" required></li><br><br>
                <li><h4>Departamento: </h4><?php echo htmlspecialchars($funcionarios['nomeDepartamento']); ?></li><br><br>
                <li><h4>Cargo: </h4><?php echo htmlspecialchars($funcionarios['nomeCargo']); ?></li><br>
                </ul>
            <button type="submit" class="btnUpload" name="enviar" value="Salvar">Salvar</button><br><br>
                </form>
            <form action="../../controller/logout.php" method="post">
                <button type="submit">Sair</button>
            </form>

        </section>
    </main>

    <footer>Desenvolvedores: Miguel e Brenda.</footer>
</body>

</html>
