<?php

require_once '../../model/classLogin.php';
    
    if(isset($_POST['txtFuncional'])){
        
        $pdo = new Login();
        
        $funcional = addslashes($_POST ['txtFuncional']);
        $senha = addslashes($_POST ['txtSenha']);
        $pdo->validaLogin($funcional, $senha);     
    } 
?>