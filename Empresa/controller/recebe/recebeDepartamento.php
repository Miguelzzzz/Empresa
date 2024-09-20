<?php

require_once '../../model/classDepartamento.php';

    if(isset($_POST['txtNomeDepart'])){ 
        
        $pdo = new Departamento();
        
        $nomeDepart = addslashes($_POST ['txtNomeDepart']);
        $created_at = addslashes($_POST['datetime']);
        $pdo->validanomeDepartamento($nomeDepart, $created_at);  
    } 
?>