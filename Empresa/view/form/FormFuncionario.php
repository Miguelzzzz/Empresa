<?php include_once '../../controller/checarAdmin.php' ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Departamento</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/datetime.js"></script>
    <script src="../js/img.js"></script>
</head>

<body>

    <?php include_once '../layout/header.php'; ?>

    <main>
        <div class="form-container">
            <fieldset>
                <?php include_once '../../controller/recebe/recebeFuncionario.php';
                $func = new Funcionario();
                ?>
                <form method="POST" enctype="multipart/form-data" action="">
                    <section id="cargo">
                        <legend> Dados do Funcionario</legend><br>
                        <input type="text" placeholder="Nome: " name="txtNome" required><br><br>
                        <input type="cpf" placeholder="CPF: " name="txtCPF" minlength="11" maxlength="11" required><br><br>
                        <input type="text" placeholder="Telefone: " name="txtTelefone" minlength="9" maxlength="15" required><br><br>
                        <input type="text" placeholder="Endereco: " name="txtEndereco" required><br><br>

                        <select name="txtCargo">
                            <?php $id = $func->consultaCargo(); ?>
                            <option value="valor">Selecione um Cargo</option>
                            <?php for ($aux = 0; $aux < count($id); $aux++) { ?>
                                <option value="<?php echo $id[$aux]['codCargo']; ?> ">
                                    <?php echo $id[$aux]['nomeCargo']; ?>
                                </option>
                            <?php } ?>
                        </select>

                        <br><br>

                        <select name="txtDepartamento">
                            <?php $id = $func->consultaDepartamento(); ?>
                            <option value="valor">Selecione um Departamento</option>
                            <?php for ($aux = 0; $aux < count($id); $aux++) { ?>
                                <option value="<?php echo $id[$aux]['codDepartamento']; ?> ">
                                    <?php echo $id[$aux]['nomeDepartamento']; ?>
                                </option>
                            <?php } ?>
                        </select>

                        <br><br>

                        <select name="txtAcesso">
                            <option value="">Selecione o nível de acesso</option>
                            <option value="1">Administrador do Sistema</option>
                            <option value="0">Funcionário Comum</option>
                        </select>

                        <br><br>

                        <input type="datetime-local" id="datetime" name="datetime"><br><br>
                        <input type="file" name="img-funcionario" class="btn btn-success" accept="image/png, image/jpeg" multiple /><br><br>
                        <input type="submit" name="btnEnviar" value="Cadastrar"><br>
                    </section><br>
                </form>
            </fieldset>
        </div>
    </main>

    <footer>Desenvolvedores: Miguel e Brenda.</footer>
</body>

</html>