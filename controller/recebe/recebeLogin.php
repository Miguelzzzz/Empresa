<?php

require_once '../../model/classLogin.php';

if (isset($_POST['txtFuncional'])) {

    $funcional = $_POST['txtFuncional'];
    $senha = $_POST['txtSenha'];

    if (strlen($_POST['txtFuncional']) == 0 || strlen($_POST['txtSenha']) == 0) {
        echo "Preencha todos os campos";
    } else {
        $login = new Login();
        $login->validaFuncionario($funcional, $senha);
    }
}
