<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION['acesso'] != '1') {
        header('Location: http://localhost/Empresa/index.php');
        exit();
    } 
?>
