<?php 

session_start();

require_once '../../model/classFuncionario.php';

$funcionario = new Funcionario();
$funcionarios = $funcionario->consultaFuncionario();

    if ($funcionarios === false) {
        echo "Erro ao consultar funcionarios.";
        exit;
    }
?>  