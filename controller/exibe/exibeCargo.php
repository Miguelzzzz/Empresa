<?php 
session_start();
require_once '../../model/classCargo.php';

$cargo = new Cargo();
$cargos = $cargo->consultaCargos();

if ($cargos === false) {
    echo "Erro ao consultar cargos.";
    exit;
}
?>