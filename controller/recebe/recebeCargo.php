<?php
require_once '../../model/classCargo.php';
    
if(isset($_POST['txtNomeCargo'])){      
    $pdo = new Cargo();
    $nomeCargo = addslashes($_POST ['txtNomeCargo']);
    $created_at = addslashes($_POST['datetime']);
    $pdo->validanomeCargo($nomeCargo, $created_at);     
}
?>