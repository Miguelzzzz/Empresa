<?php
include_once '../../model/classDepartamento.php';
 
$departamento = new Departamento();

if(isset($_GET['altera'])){
    $codDepartamento = $_GET['altera'];
    $dadosDepartamento = $departamento->obterDepartamento($codDepartamento);
}

if(isset($_POST['codDepartamento'])){
    $codDepartamento = addslashes($_POST['codDepartamento']);
    $novoNomeDepartamento = addslashes($_POST ['txtNomeNDepartamento']);
    $departamento->alterarDepartamento($codDepartamento, $novoNomeDepartamento);  
    header("Location: ../../view/consulta/ConsultaDepartamento.php");
}
?>
