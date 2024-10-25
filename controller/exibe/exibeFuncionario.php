<?php 
session_start();
require_once '../../model/classFuncionario.php';

$funcionario = new Funcionario();
$data = isset($_GET['search']) ? $_GET['search'] : '';

if (empty($data)) {
    $funcionarios = $funcionario->consultaFuncionario();
} else {
    $funcionarios = $funcionario->pesquisarFuncionario($data);
}

if ($funcionarios === false) {
    echo "Erro ao consultar funcionarios.";
    exit;
}

?>  