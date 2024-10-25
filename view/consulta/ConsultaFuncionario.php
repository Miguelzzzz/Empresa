<?php include_once '../../controller/exibe/exibeFuncionario.php'; ?>
<?php include_once '../../controller/relatorio/relatorioFuncionario.php'; ?>
<?php include_once '../../controller/checarAdmin.php' ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Cargo</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/consulta.css">
    <script src="../js/exclusao.js"></script> 
</head>
<body>

<?php include_once '../layout/header.php';?>

<main>
    <div class="const_table"><br>
        <h2>Dados dos Funcionarios</h2><br>
        <div class="searchContainer">
            <input type="search" class="form-control w-25" id="pesquisar" placeholder="Pesquisar:"/> 
            <button class="btn btn-primary" onclick="searchData()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>
        </div>
        <div class="tableContainer">
            <table>
                <thead>
                    <tr>
                        <th>&nbsp # &nbsp</th>
                        <th>&nbsp CPF &nbsp</th>
                        <th>&nbsp Nome Funcionario &nbsp</th>
                        <th>&nbsp Telefone &nbsp</th>
                        <th>&nbsp Endereço &nbsp</th>
                        <th>&nbsp Foto &nbsp</th>
                        <th>&nbsp Departamento &nbsp</th>
                        <th>&nbsp Cargo &nbsp</th>
                        <th>&nbsp Acesso &nbsp</th>
                        <th>&nbsp Data Hora &nbsp</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($funcionario['funcional']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['cpf']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['nome']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['telefone']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['endereco']); ?></td>
                            <td><img class="img" src="../../<?php echo htmlspecialchars($funcionario['img']); ?>" style="height: 130px; border-radius: 10px;" ></td>
                            <td><?php echo htmlspecialchars($funcionario['nomeDepartamento']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['nomeCargo']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['acesso']); ?></td>
                            <td><?php echo htmlspecialchars($funcionario['created_at']); ?></td>
                            <td>&nbsp 
                                <a class='btn btn-sm btn-primary' href='../edicao/editFuncionario.php?altera=<?php echo $funcionario['funcional']; ?>'>
                                    <svg class='bootstrap-icons' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                    </svg>
                                </a>
                                <a class='btn btn-sm btn-danger' href="#" onclick="excluirFuncionario(<?php echo $funcionario['funcional']; ?>)">
                                    <svg class='bootstrap-icons' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                    </svg>
                                </a>
                                <a class='btn btn-sm btn-success' href='../relatorios/relatorioFuncionario.php?imprime=<?php echo $funcionario['funcional']; ?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </a>&nbsp
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody> 
            </table>
            </div>
    </div>
</main>

<script src="../js/search.js"></script> 

        <footer>Desenvolvedores: Miguel e Brenda.</footer>
    </body>
</html>
