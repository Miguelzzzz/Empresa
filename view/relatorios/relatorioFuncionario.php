<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Departamento</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/relatorio.css">
    <script src="../js/datetime.js"></script>
    <script src="../js/img.js"></script>
</head>
<body>

<?php include_once '../layout/header.php';?>

<main>
    <section class="const_table"><br>
        <?php include_once '../../controller/relatorio/relatorioFuncionario.php';?>
                <div class="imagem-lista">  
                    <form method="POST" enctype="multipart/form-data"  action="">                  
                            <img src="../../<?php echo htmlspecialchars($funcionarios['img']); ?>" style="height: 130px; border-radius: 10px; " ><br>
                            <input type="text" name="input-funcional" value="<?php echo htmlspecialchars($funcionarios['funcional']); ?>" hidden>
                            <input type="file" name="img" class="btn btn-success"  accept="image/png, image/jpeg" multiple /><br><br>
                            <input type="datetime-local" id="datetime" name="datetime" value="<?php echo htmlspecialchars($funcionarios['created_at']); ?>" hidden>
                            <button type="submit" class="btnUpload" name="enviar" value="Salvar">Salvar</button><br><br>
                    </form>   
                </div> 

                    <ul class="dados-lista">   
                        <li><h4>Funcional: </h4><?php echo htmlspecialchars($funcionarios['funcional']); ?></li><br></br>
                        <li><h4>CPF: </h4><?php echo htmlspecialchars($funcionarios['cpf']); ?></li><br></br>
                        <li><h4>Nome: </h4><?php echo htmlspecialchars($funcionarios['nome']); ?></li><br></br>
                        <li><h4>Telefone: </h4><?php echo htmlspecialchars($funcionarios['telefone']); ?></li><br></br>
                        <li><h4>Endereço: </h4><?php echo htmlspecialchars($funcionarios['endereco']); ?></li><br></br>
                        <li><h4>Departamento: </h4><?php echo htmlspecialchars($funcionarios['nomeDepartamento']); ?></li><br></br>
                        <li><h4>Cargo: </h4><?php echo htmlspecialchars($funcionarios['nomeCargo']); ?></li><br></br>                    
                    </ul>        
    </section>   
</main>

        <footer>Desenvolvedores: Miguel e Brenda.</footer>
    </body>
</html>