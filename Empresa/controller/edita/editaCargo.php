<?php

include_once '../../model/classCargo.php';

$cargo = new Cargo();

    if(isset($_GET['altera'])){
        $codCargo = $_GET['altera'];
        
        $dadosCargo = $cargo->obterCargo($codCargo);
    } 

    if(isset($_POST['codCargo'])){
        $codCargo = addslashes($_POST['codCargo']);
        $novoNomeCargo = addslashes($_POST ['txtNomeNCargo']);
        $salario = addslashes($_POST['salario']);
        $created_at = addslashes($_POST['datetime']);

        $cargo->alterarCargo($codCargo, $novoNomeCargo, $salario, $created_at);  

        header("Location: ../../view/consulta/ConsultaCargo.php");
    }
?>
