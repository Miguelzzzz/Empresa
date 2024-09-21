<?php
    define('URL', 'http://localhost/Empresa/');
?>
<header>
    <nav class="nav-header">
        <ul>
            <li class="dropdown dropbtn"><a href="<?php echo URL; ?>view/indexAdmin.php">Home</a></li>
            <li class="dropdown dropbtn">
                <div>Cargo</div>
                <div class="dropdown-content">
                    <a href="<?php echo URL; ?>view/form/FormCargo.php">• Cadastrar Cargo </a>
                    <a href="<?php echo URL; ?>view/consulta/ConsultaCargo.php">• Consultar Cargo </a>
                </div>
            </li>
            <li class="dropdown dropbtn">
                <div>Departamento</div>
                <div class="dropdown-content">
                    <a href="<?php echo URL; ?>view/form/FormDepartamento.php">• Cadastrar Departamento </a>
                    <a href="<?php echo URL; ?>view/consulta/ConsultaDepartamento.php">• Consultar Departamento </a>
                </div>
            </li>
            <li class="dropdown dropbtn">
                <div>Funcionario</div>
                <div class="dropdown-content">
                    <a href="<?php echo URL; ?>view/form/FormFuncionario.php">• Cadastrar Funcionario </a>
                    <a href="<?php echo URL; ?>view/consulta/ConsultaFuncionario.php">• Consultar Funcionario </a>
                </div>
            </li>
        </ul>
    </nav>
</header>