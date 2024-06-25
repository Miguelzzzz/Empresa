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
    $cargo->alterarCargo($codCargo, $novoNomeCargo);  
    header("Location: ../../view/consulta/ConsultaCargo.php");
}
?>
