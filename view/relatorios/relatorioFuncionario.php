<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Departamento</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/relatorio.css">
    <script src="../js/img.js"></script>
</head>
<body>

<?php include_once '../layout/header.php';?>

<main>
    <section class="const_table"><br>
        <?php include_once '../../controller/relatorio/relatorioFuncionario.php';
        $func = new Funcionario(); 
        ?>
            <?php foreach ($funcionarios as $funcionario): ?>
                <div class="imagem-lista">                    
                    <img src="../../<?php echo htmlspecialchars($funcionario['img']); ?>" style="height: 130px; border-radius: 10px; " ><br>

                    <form method="POST"  enctype="multipart/form-data"  action="">
                        <input type="text" value='<?php echo htmlspecialchars($funcionario['funcional']); ?>' hidden>
                        <input type="file" name="img-funcionario" class="btn btn-success"  accept="image/png, image/jpeg" multiple /><br><br>
                        <button type="submit" name="btnEnviar" value="Alterar">Salvar</button><br><br>
                    </form>

                </div>     
                <ul class="dados-lista">   
                    <li><h4>Funcional: </h4><?php echo htmlspecialchars($funcionario['funcional']); ?></li><br></br>
                    <li><h4>CPF: </h4><?php echo htmlspecialchars($funcionario['cpf']); ?></li><br></br>
                    <li><h4>Nome: </h4><?php echo htmlspecialchars($funcionario['nome']); ?></li><br></br>
                    <li><h4>Telefone: </h4><?php echo htmlspecialchars($funcionario['telefone']); ?></li><br></br>
                    <li><h4>Endereço: </h4><?php echo htmlspecialchars($funcionario['endereco']); ?></li><br></br>
                    <li><h4>Departamento: </h4><?php echo htmlspecialchars($funcionario['nomeDepartamento']); ?></li><br></br>
                    <li><h4>Cargo: </h4><?php echo htmlspecialchars($funcionario['nomeCargo']); ?></li><br></br>
                </div>  
                </ul>        
            <?php endforeach; ?>
    </section>   
</main>

        <footer>Desenvolvedores: Miguel e Brenda.</footer>
    </body>
</html>