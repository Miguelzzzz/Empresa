<?php
include_once '../../model/classFuncionario.php';

$func = new Funcionario();

if(isset($_GET['excluir'])){
    $funcional = $_GET['excluir'];
    $exclusao = $func->excluirFuncionario($funcional);
    header("Location: ../../view/consulta/ConsultaFuncionario.php");
}
?>
