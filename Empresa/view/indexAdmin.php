<?php include_once '../controller/checarAdmin.php' ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Departamento</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="nav-header">
            <ul>
                <li class="dropdown dropbtn"><a href="indexAdmin.php">Home</a></li>
                <li class="dropdown dropbtn">
                    <div>Cargo</div>
                    <div class="dropdown-content">
                        <a href="form/FormCargo.php">• Cadastrar Cargo </a>
                        <a href="consulta/ConsultaCargo.php">• Consultar Cargo </a>
                    </div>
                </li>
                <li class="dropdown dropbtn">
                    <div>Departamento</div>
                    <div class="dropdown-content">
                        <a href="form/FormDepartamento.php">• Cadastrar Departamento </a>
                        <a href="consulta/ConsultaDepartamento.php">• Consultar Departamento </a>
                    </div>
                </li>
                <li class="dropdown dropbtn">
                    <div>Funcionario</div>
                    <div class="dropdown-content">
                        <a href="form/FormFuncionario.php">• Cadastrar Funcionario </a>
                        <a href="consulta/ConsultaFuncionario.php">• Consultar Funcionario </a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <main>
    <form action="../controller/logout.php" method="post">
                <button type="submit">Sair</button>
            </form>
    </main>
        <footer>
            Desenvolvedores: Miguel e Brenda.
        </footer> 
    </body>
</html>
