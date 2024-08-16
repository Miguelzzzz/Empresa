<?php
require_once '../../model/classCargo.php';
    
if(isset($_POST['txtNomeCargo'])){      
    $pdo = new Cargo();
    $nomeCargo = addslashes($_POST ['txtNomeCargo']);
    $salario = addslashes($_POST ['salario']);
    $created_at = addslashes($_POST['datetime']);
    $pdo->validanomeCargo($nomeCargo, $salario, $created_at);     
} 
?>