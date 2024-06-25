<?php
require_once '../../model/classCargo.php';
    
if(isset($_POST['txtNomeCargo'])){      
    $pdo = new Cargo();
    $nomeCargo = addslashes($_POST ['txtNomeCargo']);
    $pdo->validanomeCargo($nomeCargo);     
}
?>