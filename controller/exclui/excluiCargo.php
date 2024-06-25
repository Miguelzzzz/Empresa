<?php
include_once '../../model/classCargo.php';

$cargo = new Cargo();

if(isset($_GET['excluir'])){
    $codCargo = $_GET['excluir'];
    $exclusao = $cargo->excluirCargo($codCargo);
    header("Location: ../../view/consulta/ConsultaCargo.php");
}
?>
