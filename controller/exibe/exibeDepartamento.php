<?php 
session_start();
require_once '../../model/classDepartamento.php';

$departamento = new Departamento();
$departamentos = $departamento->consultaDepartamento();

if ($departamentos === false) {
    echo "Erro ao consultar departamentos.";
    exit;
}
?>