<?php 
require_once '../../model/classFuncionario.php';

$funcionario = new Funcionario();
$funcionarios = $funcionario->consultaFuncionario();

    if(isset($_GET['imprime'])){
        $funcional = $_GET['imprime'];
        $_SESSION['funcional'] = $funcional;

        $dadosFuncionario = $funcionario->obterFuncionario($funcional);
    }

    if ($funcionarios === false) {
        echo "Erro ao criar relatorio.";
        exit;
    }
?>