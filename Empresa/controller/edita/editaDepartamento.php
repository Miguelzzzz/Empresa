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
        $created_at = addslashes($_POST['datetime']);
        
        $departamento->alterarDepartamento($codDepartamento, $novoNomeDepartamento, $created_at);
        
        header("Location: ../../view/consulta/ConsultaDepartamento.php");
    }
?>
