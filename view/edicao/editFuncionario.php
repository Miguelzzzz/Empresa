<?php include_once '../../controller/edita/editaFuncionario.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição funcionário</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/datetime.js"></script>
</head>
<body>
    <?php include_once '../layout/header.php';?>
    <main>
        <div class="form-container">
            <fieldset>
                <form method="POST" action="">
                    <section id="funcionario">
                        <legend>Dados do Funcionário</legend><br>
                        <input type="text" placeholder="Nome: " name="txtNNome" value="<?php echo htmlspecialchars($dadosFuncionario['nome']); ?>" required><br><br>
                    <input type="cpf" placeholder="CPF: " name="txtNCPF" minlength="11" maxlength="11" value="<?php echo htmlspecialchars($dadosFuncionario['cpf']); ?>"required><br><br>
                    <input type="text" placeholder="Telefone: " name="txtNTelefone" minlength="9" maxlength="15" value="<?php echo htmlspecialchars($dadosFuncionario['telefone']); ?>" required><br><br>
                    <input type="text" placeholder="Endereco: " name="txtNEndereco" value="<?php echo htmlspecialchars($dadosFuncionario['endereco']); ?>" required><br><br>
        
                    <select name="txtNCargo">
                        <?php $cargos = $func->consultaCargo();
                            foreach ($cargos as $cargo) { $selected = ($cargo['codCargo'] == $dadosFuncionario['codCargo']) ? "selected" : "";
                        ?>
                        <option value="<?php echo $cargo['codCargo']; ?>" <?php echo $selected; ?>>
                            <?php echo $cargo['nomeCargo']; ?>
                        </option>
                        <?php } ?>
                    </select>
                                        
                    <br><br>

                    <select name="txtNDepartamento">
                        <?php $departamentos = $func->consultaDepartamento();
                            foreach ($departamentos as $departamento) { $selected = ($departamento['codDepartamento'] == $dadosFuncionario['codDepartamento']) ? "selected" : "";
                        ?>
                        <option value="<?php echo $departamento['codDepartamento']; ?>" <?php echo $selected; ?>>
                            <?php echo $departamento['nomeDepartamento']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <input type="datetime-local" id="datetime" name="datetime" value="<?php echo htmlspecialchars($dadosFuncionario['created_at']); ?>" hidden>
                    <input type="file" name="img-funcionario" class="btn btn-success"  accept="image/png, image/jpeg" value="<?php echo htmlspecialchars($dadosFuncionario['img-funcionario']); ?>"  multiple /><br><br>

                        <input type="submit" name="btnEnviar" value="Alterar">
                        <br>
                    </section><br>
                </form>
            </fieldset>
        </div>
    </main>
    <footer>Desenvolvedores: Miguel e Brenda.</footer>
</body>
</html>
