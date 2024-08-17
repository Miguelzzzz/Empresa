<?php

include_once '../../model/classDepartamento.php';

$departamento = new Departamento();

    if(isset($_GET['excluir'])){
        $codDepartamento = $_GET['excluir'];
        $exclusao = $departamento->excluirDepartamento($codDepartamento);
        
        header("Location: ../../view/consulta/ConsultaDepartamento.php");
    }
?>
