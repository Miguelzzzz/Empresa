<?php
require_once '../../model/classDepartamento.php';

if(isset($_POST['txtNomeDepart'])){           
    $pdo = new Departamento();
    $nomeDepart = addslashes($_POST ['txtNomeDepart']);
    $pdo->validanomeDepartamento($nomeDepart);  
} 
?>